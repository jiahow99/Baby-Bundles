<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function index(){
        
        $products = Product::with('images')->get()->shuffle()->take(50);
        return view('user.shop', compact('products'));

    }

    
    public function create(){
        return view('product.create');
    }


    public function store(ProductStoreRequest $request){
        // Validation

        // $validator = Validator::make(request()->all(), [
        //     'title' => 'required|min:8|max:255',
        //     'price' => 'required|numeric|between:0,999999999.99',
        //     'description' => 'nullable',
        //     'category' => 'required|in:top,bottom,outfit,shoes',
        //     'image' => 'file|required|mimes:jpeg,jfif,png'
        // ]);

        $validated = $request->validated();

        if(request()->hasFile('image')){
            $directory = 'img/'.request('category');
            $image_name = request('image')->getClientOriginalName();

            // Store in public/...
            $path = request('image')->storeAs($directory, $image_name, 'public_uploads');
        }

        // Category Id
        $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        // Create Product
        $user = Auth::user();
        $new_product = $user->products()->create($validated);

        // Create Image
        $image = ['src' => $path];
        $new_product->images()->create($image);

        // Set Category
        $new_product->category_id = $category_id;
        $new_product->save();

        if($validated){
            return route('category.index', $category_id)
        }

        // return view('category.index');


        // if($validator->fails()){
        //     // Got errors
        //     return back()->withInput();

        // }else{
        //     // No errors
        //     if(request()->hasFile('image')){
        //         $directory = 'img/'.request('category');
        //         $image_name = request('image')->getClientOriginalName();
    
        //         // Store in public/...
        //         $path = request('image')->storeAs($directory, $image_name, 'public_uploads');
        //     }
            
        //     // Category Id
        //     $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        //     // Create Product
        //     $user = Auth::user();
        //     $new_product = $user->products()->create($inputs);

        //     // Create Image
        //     $image = ['src' => $path];
        //     $new_product->images()->create($image);

        //     // Set Category
        //     $new_product->category_id = $category_id;
        //     $new_product->save();

        //     return view('category.index');
        // }


        // if(request()->hasFile('image')){
        //     $directory = 'img/'.request('category');
        //     $image_name = request('image')->getClientOriginalName();

        //     // Store in public/...
        //     $path = request('image')->storeAs($directory, $image_name, 'public_uploads');
        // }


        // // Category Id
        // $category_id = Category::whereSlug(strtolower(request('category')))->first()->id;

        // // Create Product
        // $user = Auth::user();
        // $new_product = $user->products()->create($inputs);

        // // Create Image
        // $image = ['src' => $directory];
        // $new_product->images()->create($image);

        // // Set Category
        // $new_product->category_id = $category_id;
        // $new_product->save();

        // return back()->withInput();
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
