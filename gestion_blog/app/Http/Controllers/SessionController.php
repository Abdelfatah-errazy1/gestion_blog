<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function store(Request $request){
        $validated=$request->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required',
        ]);

        if(auth()->attempt($validated)){
            session()->regenerate();
            return redirect()->route('home')->with('success','welcome back ??');
        }
    throw ValidationException::withMessages(['email'=>' the email or the password not valid try again ']);
        
        // return back() ->withInput([1, 2])->withErrors('email',' the email or the password not valid try again ');
    }
    public function create(){
       
        return view('sessions.login');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->route('home')->with('success',' good bye ');
    }
}
