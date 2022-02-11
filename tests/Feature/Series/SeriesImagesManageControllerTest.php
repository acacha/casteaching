<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * @covers SeriesImagesManageController::class
 */
class SeriesImagesManageControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /** @test */
    public function series_managers_can_update_image_series()
    {
        $this->loginAsSeriesManager();

        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'anterior.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        Storage::fake('public');

        // URI ENDPOINT -> API -> FUNCTION
        $response = $this->put('/manage/series/' . $serie->id . '/image/',[
            'image' => $file = UploadedFile::fake()->image('serie.jpg',960,540),
        ]);

        $response->assertRedirect();

        $response->assertSessionHas('status', __('Successfully updated'));

        Storage::disk('public')->assertExists('/series/'. $file->hashName());

        $this->assertEquals($serie->refresh()->image,'series/'.$file->hashName());
        $this->assertNotNull($serie->image);
        $this->assertFileEquals($file->getPathname(),Storage::disk('public')->path($serie->image));

    }

    /** @test */
    public function series_image_have_to_be_an_image()
    {
        $this->loginAsSeriesManager();

        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'series/anterior.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        Storage::fake('public');

        // URI ENDPOINT -> API -> FUNCTION
        $response = $this->put('/manage/series/' . $serie->id . '/image/',[
            'image' => $file = UploadedFile::fake()->create('serie.pdf',0,'application/pdf'),
        ]);

        $response->assertRedirect();

        $response->assertSessionHasErrors('image');

        $this->assertEquals('series/anterior.png',$serie->refresh()->image);


    }

    /** @test */
    function series_image_must_be_at_least_400px_height()
    {
        $this->loginAsSeriesManager();

        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'series/anterior.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        Storage::fake('public');
        $response = $this->put('/manage/series/' . $serie->id . '/image/',[
            'image' => $file = $file = UploadedFile::fake()->image('serie.jpg', 200, 399),
        ]);

        $response->assertRedirect();

        $response->assertSessionHasErrors('image');

        $this->assertEquals('series/anterior.png',$serie->refresh()->image);
    }

    /** @test */
    function series_image_must_be_aspect_ratio_16_9()
    {
        $this->loginAsSeriesManager();

        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'series/anterior.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        Storage::fake('public');
        $response = $this->put('/manage/series/' . $serie->id . '/image/',[
            'image' => $file = $file = UploadedFile::fake()->image('serie.jpg', 6000, 400),
        ]);

        $response->assertRedirect();

        $response->assertSessionHasErrors('image',function($error){
            dd($error);
        });

        $this->assertEquals('series/anterior.png',$serie->refresh()->image);
    }
}
