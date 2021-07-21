<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email
            ,'password' => $request->password
        ];
        if(Auth::attempt($data)){
            $user = Auth::user();
            $loginData['token'] = $user->createToken('ColorToken')->accessToken;
            return response()->json([
                'status' => 200
                ,'message' => 'Welcome'
                ,'data' => $loginData
            ], 200);
        }else{
            return response()->json([
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Sorry, wrong email address or password. Please try again',
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $loginData['token'] = $user->createToken('ColorToken')->accessToken;
        return response()->json([
            'status' => 200
            ,'message' => 'Welcome new user'
            ,'data' => $loginData
        ], 200);
    }

}
