<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function sellProduct(){
        return view('product.create');
    }
}
