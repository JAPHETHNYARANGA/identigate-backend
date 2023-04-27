<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $token = $user->createToken('API TOKEN')->plainTextToken;

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
                );
        }
    }

    public function register(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->userId = Str::uuid()->toString();
        $user ->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user ->save();

        if($res){
            return response(
                [
                    'success'=>true,
                    'message'=>'user registered successfully',
                    'user' =>$user
                ],200
            );
        }else{
            return response(
                [
                    'success'=>false,
                    'message'=>'User registered successfully'
                ],201
            );
        }

    }

    public function logout(Request $request){
        $token = $request->user()->tokens();
        $res = $token->delete();

    //     $request->user()->tokens()->delete();
    //    return response()->json(['message' => 'Tokens revoked.']);

        if($res){
            return response([
                'success'=>true,
                'message' =>'logged out'
            ],200);
        }else{
            return response([
                'success' =>false,
                'message' =>'logout failed'
            ], 201);
        }
    }
}
