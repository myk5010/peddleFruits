<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function signIn() {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $token =  $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token]);
        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function test()
    {
        return 123;
    }
}
