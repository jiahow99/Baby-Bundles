<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;



class ProductController extends Controller
{

    public function index(Category $category){
        
        $random_products = Product::all()->shuffle()->take(12);
        return view('home', compact('featured_products'));

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


    public function profile(Product $product){

        return view('product.profile', compact('product'));
        // dd($product);
    }


    // Cache Testing
    public function test(){

        $products = Cache::remember('products', 60*60, function(){
            return Product::all()->map(function($product){
                return [
                    'title' => $product->title,
                    'description' => $product->description,
                    'user' => $product->user
                ];
            });
        });

        // $products = Product::all();

        return view('test', compact('products'));

        // dd($products);

    }


}
