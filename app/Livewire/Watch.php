<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class Watch extends Component
{
    public string $key;

    public function mount(Video $video)
    {
        // Get Youtube Key
        $this->key = $video->key;
    }
}
