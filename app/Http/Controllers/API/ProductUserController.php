<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUser;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProductUserController extends Controller
{
    // Renvoie les produits liés à l'utilisateur connecté
    public function showProductUser($id)
    {
        $product_user = User::find($id)->products;

        return response()->json($product_user)->setStatusCode(200);
    }

    // Ajoute le produit à l'utilisateur
    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        $take_product = $request->input('take_product');

        $result = ProductUser::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'take_product' => $take_product
        ]);

        $id = Product::find($product_id);

        $this->update_stock($take_product, $product_id, $id->stock);

        return response()->json($result);
    }

    // Retire le nombre saisi au stock restant
    public function update_stock($take_product, $id, $stock)
    {
        if($take_product > $stock)
        {
            return response()->json('Quantité trop élévée');
        }
        else 
        {
            $pr = Product::find($id);
            $pr->stock = $stock - $take_product;

            $pr->save();
        }
    }

    // Supprime la liaison entre l'utilisateur et le produit sélectionné
    public function delete($id)
    {
        $pr = ProductUser::find($id);
        $product_id = $pr->product_id;
        $product = Product::find($product_id);

        $this->update_stock_add($pr->take_product, $product_id, $product->stock);

        $pr->delete();

        return response()->json("supprimé avec succès")->setStatusCode(200);
    }

    // Ajoute le nombre de produit pris au stock restant
    public function update_stock_add($take_product, $id, $stock)
    {
        $pr = Product::find($id);
        $pr->stock = $stock + $take_product;

        $pr->save();
    }
}
