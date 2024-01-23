<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProductUserController extends Controller
{
    public function showProductUser($id)
    {
        $product_user = User::find($id)->products;

        return response()->json($product_user);
    }
}
