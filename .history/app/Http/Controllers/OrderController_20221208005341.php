<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(){
        // Cart Items
        $cart_items = Auth::user()->cart->products;

        $data = [
            'products' => json_encode($cart_items)
        ];

        Order::create($data);

    }
}
