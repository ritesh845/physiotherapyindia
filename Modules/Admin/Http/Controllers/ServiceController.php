<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\Country;
use App\Models\CollegeMast;
use App\Models\UserService;
use Auth;
use Modules\Member\Entities\Member;
use Srmklive\PayPal\Services\ExpressCheckout;
class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $services =  Service::where('status','1')->get();
        return view('admin::services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::services.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $data = $this->validation($request);

        // return $data;
        $data['doc_url'] = $this->document_store($request);

        Service::create($data);
        return redirect('/service')->with('success','Service added successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('admin::services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin::services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validation($request);
        $service = Service::find($id);

        if($request->has('file')){
            $olddoc_url = $service->doc_url;
            if($olddoc_url != ''){
                $doc_url = explode('/', $olddoc_url);
                Storage::delete('public/2020/services_docs/'.$doc_url[2]);
            }
            $data['doc_url'] =$this->document_store($request);
        }

        $service->update($data);
        return redirect('/service')->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        $service = Service::find($id);
        $olddoc_url = $service->doc_url;
        if($olddoc_url != ''){
            $doc_url = explode('/', $olddoc_url);
            Storage::delete('public/2020/services_docs/'.$doc_url[2]);
        }
        $service->delete();
        return redirect('/service')->with('success','Service deleted successfully');

    }

    public function validation($request){
        $data =$request->validate([
            'name' => 'required|string|max:191|min:4',
            'charges'=>  'nullable|string|min:1|max:6',
            'url'    =>  'nullable|string|min:5|max:50',
            'description' => 'nullable',
            'service_type'=> 'required|not_in:""'
           
        ]);
 // 'from'   =>  'required|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
 //            'to'     =>  'sometimes|nullable|date_format:Y-m-d|after_or_equal:from',

        // if($request->service_type == 'S'){
        //     $request->validate([
        //         'to' => 'required',
        //     ],
        //     [
        //         'to.required' => 'The end date field is required.'
        //     ]
        //     );
        // }

        return $data;
    }

    public function document_store($request){
        if($request->has('file')){
            $file = $request->file('file');
            $filename =  time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/'.date('Y').'/services_docs', $filename);
            $url = (date('Y').'/services_docs/'.$filename);
           return $url;
        }
    }
    public function services_docs($id){
        $service = Service::find($id);      
        return  Storage::download('public/'.$service->doc_url);
    }

    public function member_document(Request $request){

        $request->validate([
            'file' => 'required'
        ]);
        if($request->has('file')){
            return $request->file;
        }
    }

    public function iap_membership($id){
        $colleges = CollegeMast::pluck('college_name','college_code');
        $colleges->prepend('Select IAP Member College','');
        $countries = Country::pluck('country_name','country_code');
        $countries->prepend('Select Country','');
        $service = Service::find($id);
        return view('admin::services.forms.iap_membership',compact('countries','service','colleges'));
    }

    public function iap_membership_store(Request $request){
        

        $data = $request->validate([
                    'first_name'            => 'required',
                    'middle_name'           => 'nullable',
                    'last_name'             => 'required',
                    'mobile'                => 'required',
                    'mobile1'               => 'nullable',
                    'email'                 => 'required',
                    'email1'                => 'nullable|email',
                    'relation_type'         => 'nullable',
                    'gender'                => 'required|not_in:""',
                    'dob'                   => 'required',
                    'place_of_birth'        => 'nullable',
                    'country_of_birth'      => 'nullable',
                    'dob'                   => 'required',
                    'blood_group'           => 'nullable',
                    'rel_f_name'            => 'nullable',
                    'rel_m_name'            => 'nullable',
                    'rel_l_name'            => 'nullable',
                    'p_address'             => 'required',
                    'p_country'             => 'required',
                    'p_state'               => 'required',
                    'p_city'                => 'required',
                    'p_zip_code'            => 'required',
                    'same_as'               => 'nullable',
                    'c_address'             => 'required',
                    'c_country'             => 'required',
                    'c_state'               => 'required',
                    'c_city'                => 'required',
                    'c_zip_code'            => 'required',
                    'qualification_type'    => 'nullable',
                    'qualification_name'    => 'nullable',
                    'qualification_university'=> 'nullable',
                    'qualification_year_pass' => 'nullable',
        ]);

        if($request->service_id == '10' || $request->service_id == '12'){
            $request->validate([
                'college_code' => 'required|not_in:""'
            ]);
            $data['college_code'] = $request->college_code;
        }else{
            $request->validate([
                'college_name' => 'required'
            ]);
            $data['college_name'] = $request->college_name;
        }




        if($request->address_proof_type !=''){
            $request->validate([
                'address_proof_doc' => 'required|mimes:jpeg,jpg,png,pdf'
            ]);
        }

        if($request->hasfile('address_proof_doc')){
            $request->validate([
                'address_proof_type' => 'required|not_in:""'
            ]);
            // $file = $request->file('address_proof_doc');
            // $filename =  time().'_'.$file->getClientOriginalName();
            // $path = $file->storeAs('public/'.date('Y').'/members', $filename);
            // $url = Storage::url(date('Y').'/abstractimages/'.$filename);
            // $data['image'] = $url;
        }

        $data['user_id'] = Auth::user()->id;
        $member = Member::create($data);
        UserService::create([
            'user_id'   => Auth::user()->id,
            'member_id' => $member->id,
            'service_id' => $request->service_id,
        ]);
       return redirect('service/payment/'.$member->id);
        
    }


    public function service_payment($id){
      $member =  Member::find($id);
      $userservice = UserService::where('member_id',$id)->first();
      $service = Service::find($userservice->service_id);


      return view('admin::payments.form_payment',compact('service','member'));
    
        // $data = [
        
        //         'name'  => "IAP Physiotherapy",
        //         'price' => $service->charges,
        //         'desc'  => $service->name,
        //         'qty'   => 1
            
        // ];
        // return $data;

        // $data['invoice_id'] = 1;
        // $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        // $data['return_url'] = route('payment.success');
        // $data['cancel_url'] = route('payment.cancel');
        // $data['total'] = 100;
    }
    public function payment_now($id){
      $userservice = UserService::where('member_id',$id)->first();
      $service = Service::find($userservice->service_id);

      // return $service;
       $data = [];
        $data['items'] = [
            [
                'name' => $service->name,
                'price' => $service->charges,
                'desc'  => 'Member Service Payment',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);


        return redirect($response['paypal_link']);


      return $userservice;
    }
 
}
