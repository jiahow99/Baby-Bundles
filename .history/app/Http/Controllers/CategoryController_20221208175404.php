<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use DB;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        // Cache all products
        switch ($category->slug) {

            case 'outfit':
                $products = Cache::remember('outfit_products', 60*60*24, function () {
                    return Category::whereSlug('top')->get()->first()->products;
                });
                break;

            case 'bottom':
                $products = Cache::remember('bottom_products', 60*60*24, function () {
                    return Category::whereSlug('bottom')->get()->first()->products;
                });
                break;

            case 'top':
                $products = Cache::remember('top_products', 60*60*24, function () {
                    return Category::whereSlug('top')->get()->first()->products;
                });
                break;

            case 'shoes':
                $products = Cache::remember('shoes_products', 60*60*24, function () {
                    return Category::whereSlug('shoes')->get()->first()->products;
                });
                break;

            default:
                break;
                        
        }
        return view('category.index', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }


    // Show Top(Category) Page
    public function top(){
        return view('category.top');
    }
}
