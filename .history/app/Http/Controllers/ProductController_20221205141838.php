<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{

    public function index(Category $category){
        // Get All Products
        $products = $category->products;
        
        // return view('category.index', compact('products'));
    
        // dd(Product::find(143)->images->first()->src);
        foreach($products as $product){
            dd($product);
        }
    }

    
    public function create(){
        return view('product.create');
    }


    public function store(){
        // Validation
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'price' => 'required|alpha_dash|',
            'description' => 'nullable',
            'category' => 'required|in:top,bottom,outfit,shoes'
        ]);

        // Category Id
        $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        // Create Product
        $user = Auth::user();
        $new_product = $user->products()->create($inputs);

        // Set Category
        $new_product->category_id = $category_id;
        $new_product->save();

    }
}
