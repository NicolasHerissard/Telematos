<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->only('name', 'password');
        if(Auth::attempt($login))
        {
            return response()->json($login);
        }
        else 
        {
            return response()->json('error');
        }
    }
}
