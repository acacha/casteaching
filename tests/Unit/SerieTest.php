<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @covers \App\Models\Serie::class
 */
class SerieTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function serie_have_videos()
    {
        $serie = Serie::create([
            'title' => 'TDD (Test Driven Development)',
            'description' => 'Bla bla bla',
            'image' => 'tdd.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com'),
            'created_at' => Carbon::now()->addSeconds(1)
        ]);

        $this->assertNotNull($serie->videos);
        $this->assertCount(0,$serie->videos);

        $video = Video::create([
            'title' => '101 TDD',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/ednlsVl-NHA',
            'serie_id' => $serie->id
        ]);

        $serie->refresh();
        $this->assertNotNull($serie->videos);
        $this->assertCount(1,$serie->videos);
    }
}
