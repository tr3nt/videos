<?php

namespace App\Livewire;

use App\Models\Search;
use App\Models\Video;
use Livewire\Component;

class Home extends Component
{
    public string $searchTxt = '';
    public array $videos = [];

    public function search()
    {
        // Add search text to stats
        $this->setHit();
        // Search by Title
        $v = Video::where('title', 'like', '%'.$this->searchTxt.'%')->get();
        $this->videos = $v->toArray();
        if (empty($this->videos)) {
            session()->flash('message', 'No se encontraron resultados');
            $this->searchTxt = '';
        }
    }

    private function setHit() : void
    {
        $stats = Search::where('search_txt', $this->searchTxt)->first();
        if ($stats) {
            $stats->hits++;
            $stats->save();
        } else {
            Search::create(['search_txt' => $this->searchTxt]);
        }
    }
}
