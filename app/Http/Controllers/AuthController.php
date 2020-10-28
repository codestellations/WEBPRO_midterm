<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        // dd($request->all());

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect ('/dashboard');
            // return redirect()->intended('/dashboard');
        }

        else return redirect('/login');
    }

    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        // dd($request->all());
        
        $user = new \App\Models\User;
        $user->getUserID();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone_num = $request->phone_num;
        $user->role = $request->role;

        $user->remember_token = Str::random(40);

        $user->save();
        return redirect ('/dashboard');
        
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
