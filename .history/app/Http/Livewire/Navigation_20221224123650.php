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
        $category = Category::with('products')->get();

        $this->category_id['top'] = $category->where('slug', 'bottom')->first()->id;
        $this->category_id['bottom'] = $category->where('slug', 'bottom')->first()->id;
        $this->category_id['outfit'] = $category->where('slug', 'outfit')->first()->id;
        $this->category_id['shoes'] = $category->where('slug', 'shoes')->first()->id;

        dd($this->category_id);

    }
}
