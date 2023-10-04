<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // retourne la page login 
    public function login()
    {
        $user = auth()->user();
        return view('login', [
            'user' => $user
        ]);
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

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function admin()
    {
        $admin = auth()->user();
        $user = auth()->user();

        if($admin != "")
        {
            return view('admin', [
                'admin' => $admin,
                'user' => $user
            ]);
        }
        
        return redirect()->route('login');
    }
}
