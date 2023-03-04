<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store(){
        // Cart Items
        $cart_items = Auth::user()->cart->products;

        echo json_encode($cart_items);

    }
}
