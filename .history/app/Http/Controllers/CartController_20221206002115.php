<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(){

        if(Auth::check()){
            
        }
        return response()->json(['status'=>request()->product_id]);
    }
}
