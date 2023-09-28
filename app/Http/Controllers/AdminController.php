<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminConstroller extends Controller
{
    //retourne la view Admin
    public function admin()
    {
        return view('admin');
    }
}
