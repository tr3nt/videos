<?php

namespace App\Livewire;

use App\Models\Stats;
use App\Models\Video;
use Livewire\Component;

class Watch extends Component
{
    public string $key;

    public function mount(Video $video)
    {
        // Get Youtube Key
        $this->key = $video->key;
        // Add hit to stats if not Admin
        if (!auth()->user()->hasRole('admin')) {
            $stats = Stats::whereVideosId($video->id)->first();
            $stats->hits++;
            $stats->save();
        }
    }
}
