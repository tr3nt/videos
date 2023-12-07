<?php

namespace App\Observers;

use App\Models\Stats;
use App\Models\Video;

class VideoObserver
{
    /**
     * Handle the Video "created" event.
     */
    public function created(Video $video): void
    {
        // Create video hit stats
        Stats::create(['videos_id' => $video->id]);
    }

    /**
     * Handle the Video "updated" event.
     */
    public function updated(Video $video): void
    {
        //
    }

    /**
     * Handle the Video "deleted" event.
     */
    public function deleted(Video $video): void
    {
        //
    }

    /**
     * Handle the Video "restored" event.
     */
    public function restored(Video $video): void
    {
        //
    }

    /**
     * Handle the Video "force deleted" event.
     */
    public function forceDeleted(Video $video): void
    {
        //
    }
}
