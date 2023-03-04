<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function store(){
        request()->validate([
            'title' => 'required|min:8|max:255',
            'price' => 'required|alpha_dash|',
            'category' => 'required'
        ]);

        $user = Auth::user();
        $user->products()->create(request())
    }
}
