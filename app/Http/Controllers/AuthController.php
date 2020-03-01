<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use App\User;


class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email'=> request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $user->api_token = Str::random(60);
            $user->save();
            return $this->response('success', 'login successfully', $user);
        }else{
            return $this->response('error', 'login error', '');
        }
    }
}
