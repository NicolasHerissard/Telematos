<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Renvoie tous les produits
    public function index()
    {
        $product = Product::all();

        return response()->json($product);
    }
}
