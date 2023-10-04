<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function showProductUser($id)
    {
        $user = auth()->user();
        $var = User::find($id)->products;
        $take_product = ProductUser::find($id);

        return view('users/showProductUser', [
            'var' => $var,
            'take_product' => $take_product,
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

    public function store(Request $request)
    {
        $user_id = auth()->id();
        $product_id = $request->input('product_id');
        $take_product = $request->input('take_product');

        if($take_product == null)
            return redirect()->back()->with('error', 'Vous n\'avez pas spécifier la quantité');

        ProductUser::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'take_product' => $take_product
        ]);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        
    }
}
