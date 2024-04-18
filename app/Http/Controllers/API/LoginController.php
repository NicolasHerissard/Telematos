<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Récupérer les identifiants de l'utilisateur
    public function login(Request $request)
    {
        $login = $request->only(['name', 'password']);
        if(Auth::attempt($login))
        {
            // Ajouter l'id au identifiant
            $user = Auth::user();
            $id = $user->id;

            $login['id'] = $id;

            return response()->json($login)->setStatusCode(200); // Renvoie les identifiants
        }
        
        return response()->json('error')->setStatusCode(404);
    }
    public function logout()
    {
        // Déconnecte l'utilisateur
        auth()->logout();
 
        return response()->json("Déconnexion réussie")->setStatusCode(200);
    }
}
