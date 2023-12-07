<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Watch;
use App\Models\Stats;
use App\Models\User;
use App\Models\Video;
use Livewire\Livewire;
use Tests\TestCase;

class WatchTest extends TestCase
{
    /** @test */
    public function it_increases_stats_hits_when_not_admin()
    {
        // Instanciar usuario y video
        $user = User::factory()->create();
        $video = Video::factory()->create();
        Stats::factory()->create(['videos_id' => $video->id]);

        // Ver video como visitante
        Livewire::actingAs($user)
            ->test(Watch::class, ['video' => $video])
            ->assertSet('key', $video->key);

        // Incrementan las vistas del video
        $stats = Stats::whereVideosId($video->id)->first();
        $this->assertEquals(1, $stats->hits);
    }

    /** @test */
    public function it_does_not_increase_stats_hits_when_admin()
    {
        // Instanciar usuario admin y video
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $video = Video::factory()->create();
        Stats::factory()->create(['videos_id' => $video->id]);

        // Ver video como admin
        Livewire::actingAs($admin)
            ->test(Watch::class, ['video' => $video])
            ->assertSet('key', $video->key);

        // No se incrementan las vistas del video
        $stats = Stats::whereVideosId($video->id)->first();
        $this->assertEquals(0, $stats->hits);
    }
}
