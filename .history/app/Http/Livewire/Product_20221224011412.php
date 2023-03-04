<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Product extends Component
{

    public $products;

    public function render()
    {
        return view('livewire.product');
    }

    public function mount(){
        
    }
}
