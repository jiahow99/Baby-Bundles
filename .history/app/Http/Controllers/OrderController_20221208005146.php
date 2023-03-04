<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store(){
        $products = Auth::user()->cart->products;

        echo json_encode($products);

    }
}
