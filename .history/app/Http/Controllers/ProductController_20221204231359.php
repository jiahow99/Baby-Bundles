<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function store(){
        request()->validate([
            'title' => 'required|min:8|max:255',
            
        ]);
    }
}
