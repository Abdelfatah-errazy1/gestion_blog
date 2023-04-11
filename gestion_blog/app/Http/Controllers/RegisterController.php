<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');

    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|max:50',
            'username'=>'required|min:3|max:100|unique:users,username',
            'email'=>'required|email|max:100|unique:users,email',
            'password'=>'required|min:8|max:50',
        ]);
        // $validated['password']=bcrypt( $validated['password']);
        $user=User::create($validated);

        auth()->login($user);
        // session()->flash('success','your acount has been created successfly');

        return redirect()->route('home')->with('success','your account has been created successfly');

    }
}
