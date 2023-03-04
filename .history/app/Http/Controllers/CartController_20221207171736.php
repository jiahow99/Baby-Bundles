<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{

    // Shopping Cart 
    public function index(){
        $user = Auth::user();
        $cart_items = $user->cart->products;

        return view('user.shopping-cart');
    }


    public function addToCart(){

        // User logged in
        if(Auth::check()){
            // Get Product
            $product_id = request()->product_id;
            $product = Product::find($product_id);

            $user = Auth::user();
            
            // Create Cart if not exist
            if(!$user->cart()->exists()){
                $user->cart()->create();
            }

            // Add To Cart
            $user->cart->products()->attach($product);

            // Update Cart Item Quantity
            $item_quantity = count($user->cart->products);
            $user->cart->product_qty = $item_quantity;
            $user->cart->save();

            return response()->json(['status'=> 'success']);

        // No user logged in
        }else{
            return route('login');
        }
        
    }
}
