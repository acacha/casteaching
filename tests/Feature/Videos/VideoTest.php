<?php

namespace Tests\Feature\Videos;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoTest extends TestCase
{
    /**
     * @test
     */
    public function users_can_view_videos()
    {
        // FASE 1 -> Preparació -> Prepare
        // WISHFUL PROGRAMMING -> API
        $video = Video::create([
                'title' => 'Ubuntu 101',
                'description' => '# Here description',
                'url' => 'https://youtu.be/w8j07_DBl_I',
                'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
                'completed' => false,
                'previous' => null,
                'next' => null,
                'series_id' => 1
        ]);

        // FASE 2 -> Execució -> Executa el codi a provar
        // Laravel HTTP TESTS ->
        $response = $this->get('/videos/' . $video->id);

        // FASE 3 -> Assertions -> comprovacions
        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('Here description');
        $response->assertSee('December 13');
    }
}
