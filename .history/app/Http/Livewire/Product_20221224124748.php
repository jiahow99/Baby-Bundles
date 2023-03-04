<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use App\Models\Category;

class Product extends Component
{

    public $products;
    protected $listeners = ['navigateCategory'];

    public function render()
    {
        return view('livewire.product');
    }

    public function mount(){
        $this->products = Category::where('slug', 'top')->first()->products()->with('images')->get();
    }

    public function navigateCategory($category_id){
        
    }
}
