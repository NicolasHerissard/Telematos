<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $product = Product::all();
        return view('accueil', [
            'products' => $product,
            'user' => $user
        ]);
    }
}
