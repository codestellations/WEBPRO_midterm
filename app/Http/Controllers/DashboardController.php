<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function edit($id){
        if(Auth::user()){
            $user = Auth::user()->id;

            if($user == $id){
                return view('dashboard.edit')->withUser($user);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function update(Request $request, $id){
        $user = \App\Models\User::find(Auth::user()->id);
        
        if($user){
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->phone_num = $request->user_phone_num;

            $user->save();

            return redirect('/dashboard')->with('success', 'Update data success');
        }
        else{
            return redirect()->back();
        }
    }
}
