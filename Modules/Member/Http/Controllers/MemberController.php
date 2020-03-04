<?php

namespace Modules\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Auth;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $countries = Country::pluck('country_name','country_code');
     
        $member = Member::find(Auth::user()->id);
        return view('member::member.index',compact('member','countries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('member::member.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // return $request;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return "sdaasd";
        return view('member::member.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('member::member.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $member = Member::find($id);
        $data = $request->validate([
            'name'          => 'required|max:255|min:4|string',
            'gender'        => 'required|not_in:""',
            'dob'           => 'required|before:9 years ago|date_format:Y-m-d',
            'mobile1'       => 'nullable|max:10|min:10|string',
            'iap_no'        => 'required|max:8|min:8',
            'clinic_name'   => 'nullable|max:255',
            'www'           => 'nullable',
            'address'       => 'nullable',
            'country_code'  => 'required',
            'state_code'    => 'required',
            'city_code'     => 'required',
            'zip_code'      => 'required',
            'address1'      => 'required',
            'country_code1' => 'sometimes|required',
            'state_code1'   => 'sometimes|required',
            'city_code1'    => 'sometimes|required',
            'zip_code1'     => 'required',
            'same_as'       => 'nullable',
            'about'         => 'nullable',

        ]);
        if($request->same_as !='0'){
            $data['country_code1']  = $request->country_code;
            $data['state_code1']    = $request->state_code;
            $data['city_code1']     = $request->city_code;

        }

        if($request->has('file')){
            $oldphoto = $member->image_url;
            if($oldphoto != ''){
                $image_name = explode('/', $oldphoto);
                Storage::delete('public/2020/memberimages/'.$image_name[4]);
            }
            $file = $request->file('file');

            $filename =  time().'_'.$file->getClientOriginalName();

            $path = $file->storeAs('public/'.date('Y').'/memberimages', $filename);
            $url = Storage::url(date('Y').'/memberimages/'.$filename);

            $data['image_url'] = $url;

        }
       
        $member->update($data);
        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function member_photo(Request $request){
        return $request->all();
    }
}
