<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class CartController extends Controller
{
    public function addToCart(){

        if(Auth::check()){
            // Get Product
            $product_id = request()->product_id;
            $product = Product::findOrFail($product_id);

            $user = Auth::user();

        }else{
            return route('login');
        }
        return response()->json(['status'=>request()->product_id]);
    }
}
