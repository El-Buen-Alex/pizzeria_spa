<?php

namespace App\Http\Controllers;


use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate(
            [
                'email'=> ['required', 'email'],
                'password'=> ['required']
            ]
        );

        $data=array(
            'email'=>$request->email,
            'password'=>($request->password)
        );
        if(Auth::attempt($data)){
                return response()->json(Auth::user(),200); 
        }throw ValidationException::withMessages([
            'email'=>['The provided credentials are incorrect!'.$request->email."contr: ".$request->password]
        ]);
    } 
    public function logout(){
        Auth::logout();
    }
}
