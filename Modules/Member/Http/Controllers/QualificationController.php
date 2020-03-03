<?php

namespace Modules\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\UserQual;
use Modules\Member\Entities\QualMast;
use Modules\Member\Entities\QualCatgMast;
use Modules\Member\Entities\MemberQual;
use Auth;
class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $qualifications = MemberQual::where('user_id',Auth::user()->id)->get();
        return view('member::qualification.index',compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $qual_catgs = QualCatgMast::all();

        return view('member::qualification.create',compact('qual_catgs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request);
        $member_qual = MemberQual::where('qual_catg_code', $request->qual_catg_code)->where('user_id',Auth::user()->id)->first();
        if($member_qual){
            return back()->with('warning','Qualification already added');
        }else{
            MemberQual::create($data);
            return redirect('/qualification')->with('success','Qualification added successfully');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $id;
        return view('member::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
      
        $qual_catgs = QualCatgMast::all();

        $qualification = MemberQual::find($id);

        return view('member::qualification.edit',compact('qual_catgs','qualification'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request);
        
        $member_qual = MemberQual::where('qual_catg_code', $request->qual_catg_code)->where('user_id',Auth::user()->id)->where('id', '!=' ,$id)->first();

        if($member_qual){
            return back()->with('warning','Qualification already added');
        }else{
            MemberQual::find($id)->update($data);
            return redirect('/qualification')->with('success','Qualification updated successfully');
        }


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
    public function validate($request){
        $data =  $request->validate([
            'qual_catg_code' => 'required',
            'location' => 'required|min:4|max:191',
            'board' =>  'required|min:3|max:100',
            'pass_marks'   => 'required',
            'pass_year'     => 'required|integer|min:1900|max:'.date('Y'),
            'pass_division' => 'required|not_in:""'
        ]);
        $qual_catg = QualCatgMast::where('qual_catg_code',$request->qual_catg_code)->first(); 
        $data['user_id'] = Auth::user()->id;
        $data['qual_catg_desc'] = $qual_catg->qual_catg_desc;
        return $data;
    }
}
