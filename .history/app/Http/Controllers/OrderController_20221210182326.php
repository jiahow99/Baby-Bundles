<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderController extends Controller
{
    public function index(){
        //
        $array = json_decode(Order::find(1)->products, true);
        dd($array[1]['id']);
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
        
        // Json Data
        $data = [
            'products' => json_encode($cart_items),
            'total_price' => $total
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
        session()->flash('total', $total);

        return back();        

        // dd($create->id);

    }
    
}


