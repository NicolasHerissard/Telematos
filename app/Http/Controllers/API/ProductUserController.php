<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use App\Models\User;

class ProductUserController extends Controller
{
    public function showProductUser($id)
    {
        $product_user = User::find($id)->products;

        return response()->json($product_user)->setStatusCode(200);
    }

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

    public function delete($id)
    {
        $pr = ProductUser::find($id);
        $pr->delete();

        return response()->json("supprimé avec succès")->setStatusCode(200);
    }
}
