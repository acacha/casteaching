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
            'image' => $file = UploadedFile::fake()->image('serie.jpg'),
        ]);

        $response->assertRedirect();

        Storage::disk('public')->assertExists('/series/'. $file->hashName());

        $response->assertSessionHas('status', __('Successfully updated'));

        $this->assertEquals($serie->refresh()->image,'series/'.$file->hashName());
        $this->assertNotNull($serie->refresh()->image);

    }
}
