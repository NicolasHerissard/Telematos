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
        $user = auth()->user();
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = auth()->user();
        return view('products.create', [
            'user' => $user
        ]);
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

    public function edit($id)
    {
        $product = Product::find($id);
        $user = auth()->user();
        return view('products.edit', [
            'product' => $product,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name_product = $request->input('name_product');
        $product->stock = $request->input('stock');

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Produit modifier');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Produit Supprimer');
    }
}
