<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class Manage extends Component
{
    public string $url;
    public array $form = [];
    public array $videos = [];

    public function mount()
    {
        // Get all videos with play stats
        $this->videos = Video::with('stats')->get()->toArray();
    }

    public function addVideo() : void
    {
        // Validate with Helper rules
        $this->validate(vRules(Manage::class));

        // Get video key from Youtube URL
        $this->form['key'] = getYoutubeKey($this->url);

        // Insert new video and add to videos
        $video = Video::create($this->form);
        array_push($this->videos, $video);
        $this->form['title'] = '';
        $this->url = '';

        // Set flash message
        session()->flash('message', 'Video insertado correctamente');
    }

    public function deleteVideo(int $id) : void
    {
        // Delete by Model id and reload $videos
        $video = Video::find($id);
        $video->delete();
        $this->videos = Video::all()->toArray();
    }

    // Helper Validator messages in spanish
    public function messages() : array
    {
        return vMessages(Manage::class);
    }
}
