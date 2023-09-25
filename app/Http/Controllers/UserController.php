<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
