<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use App\Models\Category as Products;

class Product extends Component
{

    public $products;

    public function render()
    {
        return view('livewire.product');
    }

    public function mount(){
        $this->products = Products::all();
    }
}
