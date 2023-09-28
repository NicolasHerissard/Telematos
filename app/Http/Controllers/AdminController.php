<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConstroller extends Controller
{
    //retourne la view Admin
    public function admin()
    {
        return view('admin');
    }
}
