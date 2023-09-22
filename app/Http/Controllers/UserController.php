<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
            return redirect()->route('users.index');
        }

        return redirect()->route('register');
    }

    // retourne la page register
    public function register()
    {
        return view('register');
    }

    // crée un utilisateur
    public function registerUser(Request $request)
    {

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login');
    }

    public function IsConnect()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        return redirect()->route('users.index');
    }

    // retourne la page des utilisateurs rempli avec les données de la bdd 
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            $users
        ]);
    }

    // retourne la page de création utilisateurs 
    public function create()
    {
        return view('users.create');
    }
}
