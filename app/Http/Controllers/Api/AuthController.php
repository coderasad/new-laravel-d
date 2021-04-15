<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message'=> 'Invalid credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=> auth()->user(), 'access_token' => $accessToken ]);
    }

    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validateData['password'] = bcrypt($request->password);
        $user = User::create($validateData);
        if($user){
            $accessToken = $user->createToken('authToken')->accessToken;
            return response([
                'user' => $user,
                'access_token' => $accessToken
            ]);
        }else{
            return response()->json(['error' => "Error ..."]);
        }
    }
}
