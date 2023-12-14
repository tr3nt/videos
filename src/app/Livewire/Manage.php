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

        $url = "https://img.youtube.com/vi/{$this->form['key']}/0.jpg";
        $headers = get_headers($url);
        
        // Check is a valid video key
        if ($headers && strpos($headers[0], '200') !== false) {
            // Insert new video and add to videos
            $video = Video::create($this->form);
            array_push($this->videos, $video);
            $this->form['title'] = '';
            $this->url = '';

            // Set flash message
            session()->flash('message', 'Video insertado correctamente');
        }
        else {
            session()->flash('message', 'Video no válido');
        }
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
