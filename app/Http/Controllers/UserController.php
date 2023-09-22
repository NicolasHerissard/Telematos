<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $login = $request->only('name', 'password');
        if(Auth::attempt($login))
        {
            return redirect()->route('users.index');
        }

        return redirect()->route('register');
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', [
            $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }
}
