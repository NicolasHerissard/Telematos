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
        $auth_user = auth()->user();
        $users = User::all();

        if($auth_user->isadmin == 1)
        {
            return view('users.index', [
                'users' => $users,
                'user' => $auth_user
            ]);
        }

        return redirect()->route('home');
    }

    // retourne la page de création utilisateurs 
    public function create()
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {            
            return view('users.create', [
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if($user->isadmin == 1)
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

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            $user = User::find($id);
            return view('users.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $users = auth()->user();

        if($users->isadmin == 1)
        {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->isadmin = $request->input('isadmin');

            $user->save();

            return redirect()->route('admin.users')->with('success', 'Utilisateur modifier');
        }
        
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $users = auth()->user();
        
        if($users->isadmin == 1)
        {
            $id_user = auth()->id();
            if($id != $id_user)
            {
                $user = User::find($id);
                $user->delete();

                return redirect()->route('admin.users')->with('success', 'Utilisateur supprimer');
            }

            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas supprimer votre propre utilisateur');
        }

        return redirect()->route('home');
    }
}
