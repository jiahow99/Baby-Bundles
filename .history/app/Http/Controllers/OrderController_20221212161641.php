<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;


class OrderController extends Controller
{
    public function index(){
        
        $orders = Auth::user()->orders;

        return view('user.order.index', compact('orders'));
        
    }

    public function view(Order $order){
        // Order Products
        $products = unserialize(json_decode($order->products));

        // Set Image
        foreach ($products as $product) {
            $category = $product->category->name;
            dd($product->category->name)l
            $product['category'] = $category;
            $product['image'] = $product->images()->first()->src;
        }
        
        return response()->json($products);
    }

    
    public function store(){
        // Cart Items
        $cart_items = Auth::user()->cart->products;
        $item_quantity = Auth::user()->cart->product_qty;
        

        // Total Price
        $total = 0;
        foreach($cart_items as $item){
            $total += $item->price;
        }
        
        // Add extra charge (packaging & service fee)
        $total_charge = $total + 3.4;

        // Json Data
        $data = [
            'products' => json_encode(serialize($cart_items)),
            'total_price' => $total_charge
        ];

        // Place Order
        $order = Auth::user()->orders()->create($data);

        // Clear Cart
        Auth::user()->cart->products()->detach();
        Auth::user()->cart->product_qty = 0;
        Auth::user()->cart->save();

        // Flash data
        session()->flash('order-placed');
        session()->flash('order', $order);
        session()->flash('item_quantity', $item_quantity);
        session()->flash('item_price', $total);
        session()->flash('total', $total_charge);

        return back();        
    }


}


