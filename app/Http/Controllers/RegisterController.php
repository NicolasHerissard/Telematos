<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // retourne la page register
    public function register()
    {
        return view('register');
    }

    // crée un utilisateur
    public function registerUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        if($name != "" && $email != "" && $password != "")
        {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);

            return redirect()->route('login');
        }

        return redirect()->route('register')->with('error', 'Vous n\'avez pas renseigné les informations nécessaires');
    }
}
