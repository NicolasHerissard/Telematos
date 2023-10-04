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
        $user = auth()->user();
        $users = User::all();

        return view('users.index', [
            'users' => $users,
            'user' => $user
        ]);
    }

    // retourne la page de création utilisateurs 
    public function create()
    {
        $user = auth()->user();
        return view('users.create', [
            'user' => $user
        ]);
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

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->isadmin = $request->input('isadmin');

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur modifier');
    }

    public function delete($id)
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
}
