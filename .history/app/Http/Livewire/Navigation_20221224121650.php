<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{

    public $category;
    public $active_id;

    public function render()
    {
        return view('livewire.navigation');
    }

    public mount(){
        
    }
}
