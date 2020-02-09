<?php

namespace App\Http\Controllers;
use http\Exception;
use App\User;
use Illuminate\Http\Request;
class AuthController extends Controller
{


//    Custom login register
    public function signupForm(){
        return view('frontend.pages.signup');
    }
    public function signupProcess(Request $request){
        $this->validate($request,[
           'full_name'   => 'required',
           'email'   => 'required|unique:users,email',
           'phone_number'   => 'required|min:6|max:13|unique:users,phone_number',
           'password'   => 'required|min:6|confirmed',
        ],[
            'full_name.required' => "The name filed must be fillup"  // if used custome error message
        ]);
       $data =[
         'full_name'=> $request->input('full_name'),
         'email'=> strtolower($request->input('email')),
         'phone_number'=> $request->input('phone_number'),
         'password'=> bcrypt($request->input('password')),
       ];
       try {
           User:: create($data);
           session()->flash('message','User account created');
           session()->flash('type','success');
           return redirect()->route('signin');

       }catch (Exception $e){
           session()->flash('message',$e->getMessage());
           session()->flash('type','danger');

            return redirect()->back();
        }

    }
    public function loginForm(){
        return view('frontend.pages.login');
    }

    public function loginProcess(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6 '
        ]);
        $credentials = $request->accepts(['_token']);

        if (auth()->attempt($credentials)){
            return redirect()->route('/');
        }
        session()->flash('message','Invalid credentials.');
        session()->flash('type','danger');
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();

        session()->flash('message','User has bess logout');
        session()->flash('type','success');

       return redirect()->route('login');
    }

}
