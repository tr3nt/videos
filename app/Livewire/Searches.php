<?php

namespace App\Livewire;

use App\Models\Search;
use Livewire\Component;

class Searches extends Component
{
    public array $searches = [];

    public function mount()
    {
        // Get search history
        $s = Search::orderByDesc('hits')->get();
        $this->searches = $s->toArray();
    }
}
