<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // retourne la page login 
    public function login()
    {
        return view('login');
    }

    // Check le name et le password
    public function loginUser(Request $request)
    {
        $login = $request->only('name', 'password');
        if(Auth::attempt($login))
        {
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Nom ou mot de passe incorrect');
    }
}
