<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class Authuser extends Controller
{
    function Authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:45',
            'password' => 'required|min:6|max:20',
        ]);

        if($validator->fails()){
            return view('public.login',['error', $validator->getMessageBag()]);
        }else{

            $credentials  = [
                'email'=> $request->email,
                'password' => $request->password
            ];

            print_r($credentials);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();                             
                return redirect()->intended('dashboard');
            }else{
                return  view('public.login',['error'=>'Access Denied!!! Invalid credentials']);
            }
                
        }

    }

    function logout(Request $request){
        $request->session()->forget('okab_session');
        $request->session()->flush();
        return redirect('login')->withErrors('error','Please Re-Login to continue...');
        //return  view('public.login',['error'=>'Please Re-Login to continue...']);
    }
    function login(Request $request){
        return  view('public.login');
    }
}
