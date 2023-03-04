<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function addToCart(){

        if(Auth::check()){
            // Get Product
            $product_id = request()->product_id;
            $product = Product::find($product_id);

            $user = Auth::user();

            // Create Cart if not exist
            if(!$user->cart()->exists()){
                $user->cart()->create();
            }

            // Add Product to Cart
            $user->cart->products()->attach($product);

            return response()->json(['status'=> 'success']);

        }else{
            return route('login');
        }
        
    }
}
