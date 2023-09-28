<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $product = Product::all();
        return view('accueil', [
            'product' => $product
        ]);
    }

    public function add()
    {
        // todo fonction pour ajouter des product qu'on pourra utilise dans un formulaire dans le pannel admin
    }
}
