<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderController extends Controller
{
    public function index(){
        //
        $array = json_decode(Order::find(1)->products, true);
        dd($array[1]['id']);
    }

    
    public function store(){
        // Cart Items
        $cart_items = Auth::user()->cart->products;


        // Total Price
        $total = 0;
        foreach($cart_items as $item){
            $total += $item->price;
        }
        
        // Json Data
        $data = [
            'products' => json_encode($cart_items),
            'total_price' => $total
        ];

        // Place Order
        Order::create($data);

        // Clear Cart
        Auth::user()->cart->products()->detach();

        

    }

    
}


