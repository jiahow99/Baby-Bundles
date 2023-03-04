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
        
        // Get User's Products
        $user = Auth::user();
        $cart_items = $user->cart->products()->with('images', 'category')->get();

        // Cart Item Quantity
        $item_quantity = $user->cart->product_qty; 

        $total = 0;

        // Add Image Src to Array
        foreach($cart_items as $item){
            $item['src'] = $item->images->first()->src;
            $total += $item->price;
        }

        return view('user.cart', compact('cart_items', 'item_quantity', 'total'));    
    }


    public function fetch_cart_items(){

        $user = Auth::user();
        $cart_items = $user->cart->products;

        // Add Image Src to Array
        foreach($cart_items as $item){
            $item['src'] = $item->images->first()->src;
        }
        
        // Encode JSON
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
            $user->cart->product_qty = $item_quantity;
            $user->cart->save();

            return response()->json(['status'=> 'success']);

        // No user logged in
        }else{
            return route('login');
        }
        
    }

    public function fetch_cart_quantity(){
        
        $user = Auth::user();
        $cart = $user->cart;
        $quantity = count($cart->products);

        return json_encode($cart);
    }


    // Cart Remove Product
    public function remove(Product $product){
        
        $cart = Auth::user()->cart;
        $cart->products()->detach($product);
        
        // Update Quantity
        $cart->product_qty = count($cart->products);
        $cart->save();

        session()->flash('deleted', $product->title.' are removed');
        return back();

    }
}
