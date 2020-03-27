<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\SendCode;
use Mail;
use App\Mail\VerifyMail;
use App\Models\GlobalTag;
use Modules\Member\Entities\Member;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','string','max:11','min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
       
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect('/verify?phone='.$request->phone)->with('success','We sent activation code, Check your mobile and also check your email and click on the link to verify your email');
    }
    
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['first_name']." ".$data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        if($user){
            $user->attachRole('3');
            $user->code = SendCode::sendCode($user->phone);                
            $user->code = "1234";                
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new VerifyMail($user));
            member_create($user,$data);
        }
    }


    // public function verifyUser($token)
    // {
        
    //   $verifyUser = VerifyUser::where('token', $token)->first();

    //     if(isset($verifyUser) ){
    //         $user = $verifyUser->user;
    //         if($user->status== $result[2]['status_id']) {
    //             $verifyUser->user->status = $result[0]['status_id'];
    //             $verifyUser->user->save();
    //             $success = $result[0]['status_text'];
    //         }else{
    //             $success = "Your e-mail is already verified. You can now login.";
    //         }
    //     }else{
    //         return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
    //     }

    //     return redirect('/login')->with('success', $success);
    // }



}
