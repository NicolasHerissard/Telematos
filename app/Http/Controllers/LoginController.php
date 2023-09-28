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
        return view('login');
    }

    // Check le name et le password
    public function loginUser(Request $request)
    {
        $login = $request->only('name', 'password');
        if(Auth::attempt($login))
        {
            if(auth()->user()->isadmin == '1')
            {
                return redirect()->route('admin.admin');
            }
            
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

        if($admin != "")
        {
            return view('admin', [
                'admin' => $admin,
            ]);
        }
        
        return redirect()->route('login');
    }
}
