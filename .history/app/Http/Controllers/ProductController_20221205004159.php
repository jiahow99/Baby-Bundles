<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function store(){
        
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'price' => 'required|alpha_dash|',
            'description' => 'nullable',
        ]);

        // Category Id
        $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        $user = Auth::user();
        $new_product = $user->products()->create($inputs);

        // Update Category
        $new_product->category_id = $category_id;
        $new_product->save();

    }
}
