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

    private function filter_entry($entry)
    {
        if($entry != "")
        {
            $entry = htmlentities($entry);
            return $entry;
        }
    }

    // crée un utilisateur
    public function registerUser(Request $request)
    {
        $name = $this->filter_entry($request->input('name'));
        $email = $this->filter_entry($request->input('email'));
        $password = Hash::make($request->input('password'));

        //$request->validate($request->all());

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
