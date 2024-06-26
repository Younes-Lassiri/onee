<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required|confirmed'
        ]);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" => true,
            "message" => "User Created Successfully"
        ]);
    }
    
    public function login(Request $request){
        $request->validate([
            "email" => 'required|email',
            "password" => 'required'
        ]);

        if (Auth::attempt([
            "email" => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();

            $token = $user->createToken("myToken")->accessToken;

            return response()->json([
                "status" => true,
                "message" => "User Loged In successfully",
                "token" => $token
            ]);

        }else{
            return response()->json([
                "status" => false,
                "message" => "Invalid Login Infos"
            ]);
        }
    }


    public function profile(){

        $user = Auth::user();

        return response()->json([
            "status" => true,
            "message" => "Profile Infos",
            "data" => $user
        ]);

    }

    public function logout(){
        auth()->user()->token()->revoke();
        return response()->json([
            "status" => true,
            "message" => "User Loged out"
        ]);
    }
}
