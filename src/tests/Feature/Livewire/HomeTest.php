<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Home;
use App\Models\Search;
use App\Models\Stats;
use App\Models\Video;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function busqueda_registra_stats_y_devuelve_resultados()
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

        // Eliminar datos de prueba
        Search::whereSearchTxt('Video')->delete();
        $v = Video::whereTitle('Video 1')->first();
        Stats::whereVideosId($v->id)->delete();
        $v->forceDelete();
        $v = Video::whereTitle('Video 2')->first();
        Stats::whereVideosId($v->id)->delete();
        $v->forceDelete();
        $v = Video::whereTitle('Video 3')->first();
        Stats::whereVideosId($v->id)->delete();
        $v->forceDelete();
    }

    /** @test */
    public function busqueda_muestra_mensaje_si_no_hay_resultados()
    {
        $this->withoutExceptionHandling();
        
        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'Non-existent Video')
            ->call('search')
            ->assertSeeHtml('No se encontraron resultados');

        // Verificar que se haya registrado el hit en stats
        $this->assertDatabaseHas('searches', ['search_txt' => 'Non-existent Video']);

        // Eliminar datos de prueba
        Search::whereSearchTxt('Non-existent Video')->delete();
    }

    /** @test */
    public function busqueda_incrementa_stats_existentes()
    {
        // Crear una búsqueda existente
        $search = Search::factory()->create(['search_txt' => 'Existing Search']);

        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'Existing Search')
            ->call('search');

        // Verificar que el contador de hits se haya incrementado
        $this->assertEquals(2, $search->fresh()->hits);

        // Eliminar datos de prueba
        Search::whereSearchTxt('Existing Search')->delete();
    }

    /** @test */
    public function busqueda_nueva_crea_stats()
    {
        // Crear una instancia de Home
        Livewire::test(Home::class)
            ->set('searchTxt', 'New Search')
            ->call('search');
        
        // Verificar que se haya creado una nueva búsqueda
        $this->assertDatabaseHas('searches', ['search_txt' => 'New Search', 'hits' => 1]);

        // Eliminar datos de prueba
        Search::whereSearchTxt('New Search')->delete();
    }
}
