<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class Home extends Component
{
    public string $searchTxt = '';
    public array $videos = [];

    public function search()
    {
        // Search by Title
        $v = Video::where('title', 'like', '%'.$this->searchTxt.'%')->get();
        $this->videos = $v->toArray();
    }
}
