<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store(){
        $products = Auth::user()->cart->products;

        dd(json_encode($products));

    }
}
