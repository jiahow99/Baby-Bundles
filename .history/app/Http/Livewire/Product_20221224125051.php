<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use App\Models\Category;

class Product extends Component
{

    public $products;
    public $category_id;

    protected $listeners = ['navigateCategory'];

    public function render()
    {
        return view('livewire.product');
    }

    public function mount(){
        $this->products = Category::find($this->category_id)->products()->with('images')->get();
    }

    public function navigateCategory($category_id){
        $this->category_id = $category_id;
        dd($this->category_id);
    }
}
