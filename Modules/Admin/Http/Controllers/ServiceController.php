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
        $services =  Service::all();
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
        $service = Service::find($id);
        return view('admin::services.forms.iap_membership',compact('countries','service','colleges'));
    }

}
