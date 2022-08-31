<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        if($request->has('image'))
        {
            $image = $request->image;
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(('C:\Users\YC£\berkan_printnew\public\profil'), $image_name);
        }
        else
        {
            $image_name = 'default.png';
        }
        $user = User::create([
            'name' => $request->input(key:'name'),
            'image' => $image_name,
            'email' => $request->input(key:'email'),
            'password' => Hash::make($request->input(key:'password')),
            ]);

            return $user;
    }

    public function login (Request $request)
    {
        $fields = $request->validate([

            'email'=>'required|string|email',
            'password'=>'required|string'
            ]);

            //Check email

            $user= User::where('email', $fields['email'])->first();

            //Check Password
            if(!$user || !Hash::check($fields['password'], $user->password) ){
                return response([
                    'message'=>'Invalid Credentials'
                ], 401);
            }

            $token = $user->createToken('myapptoken')->plainTextToken;

            $response= [
                'user' => $user,
                'token'=> $token
            ];

            return response($response, 201);

        // $accessToken = auth()->user()->createToken('authToken')->accessToken;

        // return response(['user' => auth()->user(), 'access_token' => $accessToken], 200);


    }

}
