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

    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $name_product = $request->input('name_product');
        $stock = $request->input('stock');

        if($name_product != "" && $stock != "")
        {
            Product::create([
                'name_product' => $name_product,
                'stock' => $stock
            ]);

            return redirect()->route('admin.products')->with('success', 'Produit créer avec succès');
        }

        return redirect()->route('admin.products.create')->with('error', 'Vous n\'avez pas spécifier toutes les informations');
    }
}
