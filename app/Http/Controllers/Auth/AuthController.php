<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //for user login

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '200',
                'message' => 'Incorrect Credentials...',
            ]);
        }
        $userData = User::where('email',$request->email)->first();
        if($userData){
        $checkInputPassword = Hash::check($request->password,$userData->password);
            if($checkInputPassword){
                return response()->json([
                    'userData'      => $userData,
                    'accessToken'   => $userData->createToken(time())->plainTextToken
                ]);
            }else {
                return response([
                    'userData'    => null,
                    'accessToken' => null,
                ]);
            }
        }
    }

    // for user Register

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['message' => 'User registered successfully',
         'user' => $user,
         'accessToken'   => $user->createToken(time())->plainTextToken
        ]);
    }

}
