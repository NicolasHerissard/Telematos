<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
        Renvoie la vue home avec les produits 
    */
    public function home()
    {
        if(auth()->id())
        {
            $user = auth()->user();
            $product = Product::all();
            return view('accueil', [
                'products' => $product,
                'user' => $user
            ]);
        }

        return redirect()->route('login');
    }
}
