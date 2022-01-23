<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\SeriesApiController::class
 */
class SeriesApiTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /** INDEX */

    /** @test */
    public function guest_users_can_index_published_series()
    {
        $series = create_sample_series();

        $response = $this->get('/api/series');

        $response->assertStatus(200);

        $response->assertJsonCount(count($series));
    }

    /** SHOW */

    /** @test */
    public function guest_users_can_show_published_series()
    {
        $serie = Serie::create([
            'title' => 'TDD (Test Driven Development)',
            'description' => 'Bla bla bla',
            'image' => 'tdd.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
        ]);

        $response = $this->getJson('/api/series/' . $serie->id);

        $response->assertStatus(200);

        $response->assertSee($serie->title);
        $response->assertSee($serie->description);
        $response->assertSee($serie->id);

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('id', $serie->id)
                ->where('title', $serie->title)
                ->where('image', $serie->image)
                ->where('image', $serie->image)
                ->where('teacher_name', $serie->teacher_name)
                ->where('teacher_photo_url', $serie->teacher_photo_url)
                ->etc()
            );

//        $response->assertJsonPath('title', $serie->title);
    }

    /** @test */
    public function guest_users_cannot_show_unexisting_series()
    {
        $response = $this->get('/api/series/999');

        $response->assertStatus(404);
    }
}
