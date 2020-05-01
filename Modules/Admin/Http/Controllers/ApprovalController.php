<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\MemberQual;
use Modules\Member\Entities\Member;
use App\Notifications\NotifyMessage;
use Illuminate\Support\Facades\Notification;
use App\User;
use Modules\Member\Entities\UserSpec;
use App\Models\UserService;
class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function qualifications(){
    	$member_ids = MemberQual::where('status','P')->distinct()->pluck('user_id');
    	$members = Member::whereIn('id',$member_ids)->get(); 
		return view('admin::approval.qualification',compact('members'));
    }

    public function qualification_show($id){
    	$qualifications = MemberQual::where('status','P')->where('user_id',$id)->get();
  		return view('admin::approval.qualification_show',compact('qualifications'));
    }
    public function qualification_approve($id){
    	$qual = MemberQual::find($id);
    	$qual->status = 'A';
    	$qual->save();

        $this->qual_approved_message($qual);

    	return redirect()->back()->with('success','Member qualification approved successfully');
    }
    public function qualification_approve_all(Request $request){
        MemberQual::whereIn('id',$request->ids)->update(['status' => 'A']);
        $quals = MemberQual::whereIn('id',$request->ids)->get();
        foreach ($quals as $qual) {
            $this->qual_approved_message($qual);
        }

        return 'Member qualification approved successfully';

    }

    public function qualification_decline(Request $request){
        $qual = MemberQual::find($request->id);
        $qual->update(['status' => 'D','reason' => $request->reason]);
        $this->qual_declined_message($qual);
        return redirect()->back()->with('success','Member qualification declined successfully');
    }

    public function qualification_decline_all(Request $request){

        MemberQual::whereIn('id',$request->ids)->update(['status' => 'D', 'reason' => $request->reason ]);
        $quals = MemberQual::whereIn('id',$request->ids)->get();

        foreach ($quals as $qual) {
            $this->qual_declined_message($qual);
        }
      
        return 'Member qualification declined successfully';
    }

    public function qual_approved_message($qual){
        $user = User::find($qual->user_id);
        $message = [
            'id'     => $qual->user_id,
            'title'  => 'Physiotherapy approved your qualification.',
            'message'=> $qual->qual_catg_desc.' qualification approved successfully.',
            'link'   => '/qualification',
        ];

        $user->notify(new NotifyMessage($message));
    }

    public function qual_declined_message($qual){
        $user = User::find($qual->user_id);
            $message = [
                'id'     => $qual->user_id,
                'title'  => 'Physiotherapy declined your qualification.',
                'message'=> $qual->qual_catg_desc.' qualification declined contact physiotherapy team.',
                'link'   => '/qualification',
            ];
        $user->notify(new NotifyMessage($message));
    }


    public function specialization(){
        $member_ids = UserSpec::where('status','P')->distinct()->pluck('user_id');

        $members = Member::whereIn('id',$member_ids)->get(); 
        return view('admin::approval.specialization',compact('members'));
    }
    public function specialization_show($id){

        $specs = UserSpec::with('specializations')->where('status','P')->where('user_id',$id)->get();
        $user_id = $id;
        return view('admin::approval.specialization_show',compact('specs','user_id'));

    }
    public function specialization_approve($id){
        $ids = explode(',', $id);
        
        UserSpec::where('user_id',$ids[1])->where('specialization_id',$ids[0])->update(['status' => 'A']);
        $spec = UserSpec::with('specializations')->where('user_id',$ids[1])->where('specialization_id',$ids[0])->first();
     
        $this->spec_approved_message($spec);
        
        return redirect()->back()->with('success','Member specialization approved successfully');
    
    }

    public function specialization_approve_all(Request $request){
      
        UserSpec::where('user_id',$request->user_id)->whereIn('specialization_id',$request->ids)->update(['status' => 'A']);     
       
        $specs = UserSpec::with('specializations')->where('user_id',$request->user_id)->whereIn('specialization_id',$request->ids)->get();

        foreach ($specs as $spec) {
            $this->spec_approved_message($spec);
        }

        return 'Member specialization approved successfully';

    }

    public function specialization_decline(Request $request){
       
        UserSpec::where('user_id',$request->user_id)->where('specialization_id',$request->id)->update(['status' => 'D','reason' => $request->reason]);
    
        $spec = UserSpec::with('specializations')->where('user_id',$request->user_id)->where('specialization_id',$request->id)->first();

        $this->spec_declined_message($spec);

        return redirect()->back()->with('success','Member specialization declined successfully');
    }  

    public function specialization_decline_all(Request $request){
        UserSpec::where('user_id',$request->user_id)->whereIn('specialization_id',$request->ids)->update(['status' => 'D','reason' => $request->reason]);      
     
        $specs = UserSpec::with('specializations')->where('user_id',$request->user_id)->whereIn('specialization_id',$request->ids)->get();

        foreach ($specs as $spec) {
            $this->spec_declined_message($spec);
        }
      
        return 'Member qualification declined successfully';
    }

    public function spec_approved_message($spec){
        $user = User::find($spec->user_id);
        $message = [
            'id'     => $spec->user_id,
            'title'  => 'Physiotherapy approved your specialization.',
            'message'=> $spec->specializations->name.' specialization approved successfully.',
            'link'   => '/specialization',
        ];
        $user->notify(new NotifyMessage($message));
    }

    public function spec_declined_message($spec){
        $user = User::find($spec->user_id);
            $message = [
                'id'     => $spec->user_id,
                'title'  => 'Physiotherapy declined your specialization.',
                'message'=> $spec->specializations->name.' specialization declined contact physiotherapy team.',
                'link'   => '/specialization',
            ];
        $user->notify(new NotifyMessage($message));
    }
    public function service_request(){
        $services = UserService::with('service')->with('member')->where('status','P')->get();
        return view('admin::approval.services.service_request',compact('services'));
    }
}
