<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authentication extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' =>'required'
        ]);

        $email = $request['email'];
        $user = User::where('email', $email)->firstOrFail();
        $token = $user->createToken('API TOKEN')->accessToken;

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return response(
                [
                    'success'=>true,
                    'message'=>'User logged in successfully',
                    'user' =>$user,
                    'token' => $token
                ], 200
            );
        }else{
            return response(
                [
                    'success' =>false,
                    'message'=>'Login Failed'
                ]
            )
        }
    }
}
