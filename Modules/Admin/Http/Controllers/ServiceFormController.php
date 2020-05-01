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
use Modules\Admin\Entities\MemberType;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyMessage;
class ServiceFormController extends Controller
{
    public function coming_soon($id){
        $service = Service::find($id);
        return view('admin::services.forms.coming_soon',compact('service'));
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
        $data['dob'] = date('Y-m-d',strtotime($request->dob));
        // return $data;
        if($request->service_id == '10' || $request->service_id == '12'){
            $request->validate([
                'college_code' => 'required|not_in:""'
            ]);
            $data['college_code'] = $request->college_code;

            if($request->service_id == '10'){
                $data['member_type'] = '1';
            }else{
                $data['member_type'] = '3';
            }
            
        }else{
            $request->validate([
                'college_name' => 'required'
            ]);
            $data['college_name'] = $request->college_name;

            if($request->service_id == '11'){
                $data['member_type'] = '2';
            }else{
                $data['member_type'] = '4';
            }
        }

        if($request->address_proof_type !=''){
            $request->validate([
                'address_proof_doc' =>'required|image|mimes:jpeg,png,jpg|max:2048' 
            ]);
        }

        $request->validate([
            'signature' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'photo'     => 'nullable|mimes:jpeg,png,jpg|max:2048',
            '10th_doc'  => 'nullable|mimes:jpeg,png,jpg|max:2048',
            '12th_doc'  => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'internship_doc' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'bpt_doc'   => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'mpt_doc'   => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'gov_proof' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'gov_proof1'=> 'nullable|mimes:jpeg,png,jpg|max:2048',
            'any_other_doc' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]); 


        if($request->hasfile('address_proof_doc')){
            $request->validate([
                'address_proof_type' => 'required|not_in:""'
            ]);

            $proof_file = $request->file('address_proof_doc');
            $proof_filename =  time().'_addr_proof_'.$proof_file->getClientOriginalName();
            $poof_path = $proof_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $proof_filename);
            $data['address_proof_doc']  = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$proof_filename);
        }


        if($request->hasfile('signature')){
            $sign_file = $request->file('signature');
            $sign_filename =  time().'_sign_'.$sign_file->getClientOriginalName();
            $path = $sign_file->storeAs('public/'.date('Y').'/'.date('M').'/service/memberimages/', $sign_filename);
            $data['signature'] = Storage::url(date('Y').'/'.date('M').'/service/memberimages/'.$sign_filename);
            
        }

        if($request->hasfile('photo')){
            $photo_file = $request->file('photo');
            $photo_filename =  time().'_photo_'.$photo_file->getClientOriginalName();
            $path = $photo_file->storeAs('public/'.date('Y').'/'.date('M').'/service/memberimages/', $photo_filename);
            $data['photo'] = Storage::url(date('Y').'/'.date('M').'/service/memberimages/'.$photo_filename);
        }

        if($request->hasfile('10th_doc')){
            $ten_file = $request->file('10th_doc');
            $ten_filename =  time().'_10th_'.$ten_file->getClientOriginalName();
            $path = $ten_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $ten_filename);
            $data['10th_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$ten_filename);
        }
        if($request->hasfile('12th_doc')){
            $twelve_doc_file = $request->file('12th_doc');
            $twelve_doc_filename =  time().'_12th_'.$twelve_doc_file->getClientOriginalName();
            $path = $twelve_doc_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $twelve_doc_filename);
            $data['12th_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$twelve_doc_filename);
        }
        if($request->hasfile('internship_doc')){
            $internship_doc_file = $request->file('internship_doc');
            $internship_doc_filename =  time().'_interns_'.$internship_doc_file->getClientOriginalName();
            $path = $internship_doc_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $internship_doc_filename);
            $data['internship_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$internship_doc_filename);
        }
        if($request->hasfile('bpt_doc')){
            $bpt_doc_file = $request->file('bpt_doc');
            $bpt_doc_filename =  time().'_bpt_'.$bpt_doc_file->getClientOriginalName();
            $path = $bpt_doc_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $bpt_doc_filename);
            $data['bpt_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$bpt_doc_filename);
        }
        if($request->hasfile('mpt_doc')){
            $mpt_doc_file = $request->file('mpt_doc');
            $mpt_doc_filename =  time().'_mpt_'.$mpt_doc_file->getClientOriginalName();
            $path = $mpt_doc_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $mpt_doc_filename);
            $data['mpt_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$mpt_doc_filename);
        }
        if($request->hasfile('gov_proof')){
            $gov_proof_file = $request->file('gov_proof');
            $gov_proof_filename =  time().'_gov_proof_'.$gov_proof_file->getClientOriginalName();
            $path = $gov_proof_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $gov_proof_filename);
            $data['gov_proof'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$gov_proof_filename);
        }

        if($request->hasfile('gov_proof1')){
            $gov_proof1_file = $request->file('gov_proof1');
            $gov_proof1_filename =  time().'_gov_proof1_'.$gov_proof1_file->getClientOriginalName();
            $path = $gov_proof1_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $gov_proof1_filename);
            $data['gov_proof1'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$gov_proof1_filename);
        }
        if($request->hasfile('any_other_doc')){
            $any_other_doc_file = $request->file('any_other_doc');
            $any_other_doc_filename =  time().'_other_doc_'.$any_other_doc_file->getClientOriginalName();
            $path = $any_other_doc_file->storeAs('public/'.date('Y').'/'.date('M').'/service/documents/', $any_other_doc_filename);
            $data['any_other_doc'] = Storage::url(date('Y').'/'.date('M').'/service/documents/'.$any_other_doc_filename);
        }



        $data['user_id'] = Auth::user()->id;
        $member = Member::create($data);
        $userService =UserService::create([
            'user_id'   => Auth::user()->id,
            'member_id' => $member->id,
            'service_id' => $request->service_id,
        ]);

        $message = [
            'id'     => $userService->id,
            'title'  => 'Member Applied Serivce',
            'message'=> $member->first_name.($member->middle_name !=null ? ' '.$member->middle_name : '' )." ". $member->last_name .' member service applied.',
            'link'   => '/approval/service_request',
        ];

        $users = User::whereRoleIs('member_admin')->get();
        Notification::send($users, new NotifyMessage($message));

       return redirect('service/payment/'.$member->id);
        
    }
    public function iap_membership_edit($id){
        $colleges = CollegeMast::pluck('college_name','college_code');
        $colleges->prepend('Select IAP Member College','');
        $countries = Country::pluck('country_name','country_code');
        $countries->prepend('Select Country','');
        $service = Service::find($id);
        $member = Member::find($id);
        return view('admin::services.forms.edit_iap_membership',compact('colleges','countries','service','member'));
    }
    public function iap_membership_update(Request $request,$id){

    }

    public function service_payment($id){

      $userservice = UserService::where('user_id',$id)->first();
        return $userservice;
      // $member =  Member::find($id);
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
