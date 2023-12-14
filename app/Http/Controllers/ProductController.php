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

        if($user->isadmin == 1)
        {
            $products = Product::all();
            return view('products.index', [
                'products' => $products,
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }

    public function create()
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            return view('products.create', [
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            $name_product = $request->input('name_product');
            $stock = $request->input('stock');

            if($name_product != "" && $stock != "")
            {
                Product::create([
                    'name_product' => $name_product,
                    'stock' => $stock
                ]);

                return redirect()->route('admin.products')->with('success', 'Produit créé avec succès');
            }

            return redirect()->route('admin.products.create')->with('error', 'Vous n\'avez pas spécifier toutes les informations');
        }

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            return view('products.edit', [
                'product' => $product,
                'user' => $user
            ]);
        }
        
        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            $product = Product::find($id);
            $product->name_product = $request->input('name_product');
            $product->stock = $request->input('stock');

            $product->save();

            return redirect()->route('admin.products')->with('success', 'Produit modifié');
        }

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $user = auth()->user();

        if($user->isadmin == 1)
        {
            $product = Product::find($id);

            $product->delete();

            return redirect()->route('admin.products')->with('success', 'Produit Supprimé');
        }

        return redirect()->route('home');
    }
}
