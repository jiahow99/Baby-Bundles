<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{

    public function index(){
        
        $products = Product::with('images')->get()->shuffle()->take(50);
        return view('user.shop', compact('products'));

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
            'category' => 'required|in:top,bottom,outfit,shoes',
            'image' => 'file|required|mimes:jpeg,jfif,png'
        ]);

        if(request()->hasFile('image')){
            
            $filename = request('image')->getClientOriginalName();
            Storage::disk('local')->put( $filename, request('image'));
            
        }


        // Category Id
        $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        // Create Product
        $user = Auth::user();
        $new_product = $user->products()->create($inputs);

        // Create Image
        $new_product->images()->create($filename);

        // Set Category
        $new_product->category_id = $category_id;
        $new_product->save();

    }


    public function profile(Product $product){
        
        // Category
        $product['category'] = $product->category;

        // Image
        $src = $product->images()->first()->src;
        $product['image'] = asset($src);
        
        return response()->json($product);

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
