<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->only(['name', 'password']);
        if(Auth::attempt($login))
        {
            return response()->json($login)->setStatusCode(200);
        }
        
        return response()->json('error')->setStatusCode(404);
    }
    public function logout()
    {
        auth()->logout();
 
        return response()->json("Déconnexion réussie")->setStatusCode(200);
    }
}
