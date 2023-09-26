<?php

namespace App\Http\Controllers;

use App\Models\ProductUser;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
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
}
