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
    public function aumentan_vistas_si_no_es_admin()
    {
        // Instanciar usuario y video
        $user = User::factory()->create();
        $video = Video::factory()->create();

        // Ver video como visitante
        Livewire::actingAs($user)
            ->test(Watch::class, ['video' => $video])
            ->assertSet('key', $video->key);

        // Incrementan las vistas del video
        $stats = Stats::whereVideosId($video->id)->first();
        $this->assertEquals(1, $stats->hits);

        // Eliminar datos de prueba
        $stats->delete();
        $video->forceDelete();
        $user->delete();
    }

    /** @test */
    public function no_aumentan_vistas_si_es_admin()
    {
        // Instanciar usuario admin y video
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $video = Video::factory()->create();

        // Ver video como admin
        Livewire::actingAs($admin)
            ->test(Watch::class, ['video' => $video])
            ->assertSet('key', $video->key);

        // No se incrementan las vistas del video
        $stats = Stats::whereVideosId($video->id)->first();
        $this->assertEquals(0, $stats->hits);

        // Eliminar datos de prueba
        $stats->delete();
        $video->forceDelete();
        $admin->delete();
    }
}
