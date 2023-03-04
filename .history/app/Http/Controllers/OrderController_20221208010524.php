<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(){
        // Cart Items
        // $cart_items = Auth::user()->cart->products;

        // $data = [
        //     'products' => json_encode($cart_items)
        // ];

        // Order::create($data);

        $array = json_decode(Order::find(1)->products,);
        dd($array[1]);
        // json_decode(stripslashes(Order::find(1)->product));
        // $json = utf8_encode($)

        // echo Order::find(1)->products;
    }
}
