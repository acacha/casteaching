<?php

namespace Tests\Unit;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @covers Video::class
 */
class VideoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_formatted_published_at_date()
    {
        // 1 Preparació
        // TODO CODE SMELL
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);

        // 2 Execució WISHFUL PROGRAMMING
        $dateToTest = $video->formatted_published_at;

        // 3 comprovació / assert
        $this->assertEquals($dateToTest, '13 de desembre de 2020');
    }

    /** @test */
    public function can_get_formatted_published_at_date_when_not_published()
    {
        // 1 Preparació
        // TODO CODE SMELL
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => null,
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);

        // 2 Execució WISHFUL PROGRAMMING
        $dateToTest = $video->formatted_published_at;

        // 3 comprovació / assert
        $this->assertEquals($dateToTest, '');
    }
}
