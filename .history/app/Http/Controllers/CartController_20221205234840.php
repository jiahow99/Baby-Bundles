<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(){
        return response()->json(['status'=>request()->product_id]);
    }
}
