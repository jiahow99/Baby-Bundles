<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(){
        $cart = Auth::user()->cart;
    }
}
