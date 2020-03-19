<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function states($country_code){
        $states = State::where('country_code',$country_code)->get();
        return response()->json($states);
    }
    public function cities($state_code){
        $cities = City::where('state_code',$state_code)->get();
        return response()->json($cities);
    }

    public function doc_download($id){
        $document = Documents::find($id);
 
        return Storage::download('public/'.$document->disk.'/'.$document->file_name);
    }

    public function notification_read($id){
      $notification = auth()->user()->unreadNotifications->where('id',$id)->first();
       $notification->markAsRead();
       // return "sdfsdf";
       return redirect($notification->data['link']);

    }
}
