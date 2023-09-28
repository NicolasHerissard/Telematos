<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // retourne la page des utilisateurs rempli avec les données de la bdd 
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    // retourne la page de création utilisateurs 
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $isadmin = $request->input('isadmin');

        if($name != "" && $email != "" && $password != "" && $isadmin != "")
        {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'isadmin' => $isadmin
            ]);

            return redirect()->route('admin.users')->with('success', 'Utilisateur créer avec succès');
        }

        return redirect()->route('admin.users.create')->with('error', 'Vous n\'avez pas spécifier toutes les informations');

    }
}
