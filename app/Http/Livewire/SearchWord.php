<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchWord extends Component
{
    public $post;
    public $search = '';

    public function render()
    {
        return view('livewire.search-word');
    }
}
