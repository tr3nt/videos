<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Home;
use App\Models\Search;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function search_function_sets_hit_and_returns_matching_videos()
    {
        $this->withoutExceptionHandling();

        // Crear datos de prueba
        Video::factory()->create(['title' => 'Video 1', 'key' => 'a2s3d4f5']);
        Video::factory()->create(['title' => 'Video 2', 'key' => 'a2s3d4f6']);
        Video::factory()->create(['title' => 'Video 3', 'key' => 'a2s3d4f7']);

        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'Video')
            ->call('search')
            ->assertCount('videos', 3);

        // Verificar que se haya registrado el hit en stats
        $this->assertDatabaseHas('searches', ['search_txt' => 'Video']);
    }

    /** @test */
    public function search_function_displays_no_results_message_if_no_videos_found()
    {
        $this->withoutExceptionHandling();
        
        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'Non-existent Video')
            ->call('search')
            ->assertSeeHtml('No se encontraron resultados');

        // Verificar que se haya registrado el hit en stats
        $this->assertDatabaseHas('searches', ['search_txt' => 'Non-existent Video']);
    }

    /** @test */
    public function set_hit_increments_existing_search_hit_count()
    {
        // Crear una búsqueda existente
        $search = Search::factory()->create(['search_txt' => 'Existing Search']);

        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'Existing Search')
            ->call('search');

        // Verificar que el contador de hits se haya incrementado
        $this->assertEquals(2, $search->fresh()->hits);
    }
    
    /** @test */
    public function set_hit_creates_new_search_if_search_not_found()
    {
        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'New Search')
            ->call('search');
        
        // Verificar que se haya creado una nueva búsqueda
        $this->assertDatabaseHas('searches', ['search_txt' => 'New Search', 'hits' => 1]);
    }
}
