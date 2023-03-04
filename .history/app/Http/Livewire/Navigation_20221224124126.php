<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{

    public $category;
    public $active_id;
    public $category_id = [];

    public function render()
    {
        return view('livewire.navigation');
    }

    public function mount(){
        $categories = Category::with('products')->get();

        foreach($categories as $category){
            $this->category_id[$category->slug] = $category->id;
        }
    }
}
