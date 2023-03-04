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

        // Json Data
        $data = [
            'products' => json_encode($cart_items)
        ];

        // Place Order
        Order::create($data);

    }

    
}


