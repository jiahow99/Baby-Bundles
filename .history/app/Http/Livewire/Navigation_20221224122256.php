<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{

    public $category;
    public $active_id;
    public $category_id = [
        'top',
        'bottom',
        'outfit',
        'shoes'
    ];

    public function render()
    {
        return view('livewire.navigation');
    }

    public function mount(){
        $category = Category::with('products')->get();

        $this->category_id->top = $category->where('slug', 'top')->first();
        $bottom = $category->where('slug', 'bottom')->first();
        $outfit = $category->where('slug', 'outfit')->first();
        $shoes = $category->where('slug', 'shoes')->first();
        
    }
}
