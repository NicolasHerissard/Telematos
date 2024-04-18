<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;
use Override;

class ProductUserController extends Controller
{
    // Renvoie la vue avec la liste des produits de l'utilisateur connecté
    public function showProductUser($id)
    {
        $user = auth()->user();
        $var = User::find($id)->products;

        return view('users/showProductUser', [
            'var' => $var,
            'user' => $user
        ]);
    }

    public function showAll()
    {
        $productUser = ProductUser::all();
        $user = User::all();

        return view('productUser.show', [
            'productUser' => $productUser,
            'user' => $user
        ]);
    }

    // Crée une liaison entre le produit et l'utilisateur 
    // Quand un produit est sélectionné
    public function store(Request $request)
    {
        $user_id = auth()->id();
        $product_id = $request->input('product_id');
        $take_product = $request->input('take_product');

        // Message d'erreur
        if($take_product == null)
            return redirect()->back()->with('error', 'Vous n\'avez pas spécifié la quantité');

        ProductUser::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'take_product' => $take_product
        ]);

        $id = Product::find($product_id);

        $this->update_stock_remove($take_product, $product_id, $id->stock);

        return redirect()->route('home');
    }

    // Retire le nombre saisi au stock restant
    public function update_stock_remove($take_product, $id, $stock)
    {
        if($take_product > $stock)
        {
            return redirect()->route('home')->with('error', "Quantité demandé trop élevée");
        }
        else 
        {
            $pr = Product::find($id);
            $pr->stock = $stock - $take_product;

            $pr->save();
        }
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    // Supprime la liaison entre un utilisateur et un produit
    public function delete($id)
    {
        $pr = ProductUser::find($id);
        $product_id = $pr->product_id;
        $product = Product::find($product_id);

        $this->update_stock_add($pr->take_product, $product_id, $product->stock);

        $pr->delete();

        return redirect()->route('home');
    }

    // Ajoute le nombre de produit pris au stock restant
    public function update_stock_add($take_product, $id, $stock)
    {
        $pr = Product::find($id);
        $pr->stock = $stock + $take_product;

        $pr->save();
    }
}
