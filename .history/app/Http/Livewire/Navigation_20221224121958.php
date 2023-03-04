<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{

    public $category;
    public $active_id;

    public function render()
    {
        return view('livewire.navigation');
    }

    public function mount(){
        $category = Category::with('products')->get();

        $top = $category;
    }
}
