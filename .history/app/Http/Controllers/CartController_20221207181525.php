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
        $item_quantity = $user->cart->product_qty;

        // return view('user.shopping-cart', compact('cart_items','item_quantity'));
        // echo json_encode($cart_items);

        foreach($cart_items as $item){
            $item['src'] = $item->images->first();
        }

        echo $cart_items;
        
    }


    public function fetch_cart_items(){

        $user = Auth::user();
        $cart_items = $user->cart->products;

        foreach($cart_items as $item){
            $item['src'] = $item->images->first();
        }
        
        return json_encode($cart_items);

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
