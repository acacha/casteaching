<?php

namespace Tests\Feature\Videos;

use App\Models\Serie;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosController
 */
class VideoTest extends TestCase
{
    use RefreshDatabase, CanLogin;        // ESTAT PRECONEGUT -> ZERO STATE

    /**
     * @test
     */
    public function users_can_view_video_series_navigation()
    {
        $serie = Serie::create([
            'title' => 'Introducció a Ubuntu',
            'description' => 'Bla bla bla',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => $gravatar = 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
        ]);

        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'serie_id' => $serie->id
        ]);

        $response = $this->get('/videos/' . $video->id); // SLUGS -> SEO -> TODO

        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('Here description');
        $response->assertSee('13 de desembre de 2020');
        $response->assertSee('https://youtu.be/w8j07_DBl_I');

        // NO ES MOSTRA LA NAVEGACIÓ DE SERIES
        $response->assertSee('<div id="layout_series_navigation"',false);
        $response->assertSee($serie->title);
        $response->assertSee($serie->teacher_name);
        $response->assertSee($gravatar);
    }

    /**
     * @test
     */
    public function users_can_view_videos_without_serie()
    {
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'serie_id' => null
        ]);

        $response = $this->get('/videos/' . $video->id); // SLUGS -> SEO -> TODO

        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('Here description');
        $response->assertSee('13 de desembre de 2020');
        $response->assertSee('https://youtu.be/w8j07_DBl_I');

        // NO ES MOSTRA LA NAVEGACIÓ DE SERIES
        $response->assertDontSee('<div id="layout_series_navigation"',false);
    }

    /**
     * @test
     */
    public function users_can_view_videos()
    {
        $video = $this->createPublishedVideo();

        $response = $this->get('/videos/' . $video->id); // SLUGS -> SEO -> TODO

        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('Here description');
        $response->assertSee('13 de desembre de 2020');
        $response->assertSee('https://youtu.be/w8j07_DBl_I');
    }

    /**
     * @test
     */
    public function users_cannot_view_not_existing_videos()
    {
        $response = $this->get('/videos/999');
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function guest_user_cannot_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();

        $response = $this->get('/videos/' . $video->id);

        $response->assertStatus(404);

    }

    /**
     * @test
     */
    public function regular_user_cannot_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();
        $this->loginAsRegularUser();

        $response = $this->get('/videos/' . $video->id);

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function manager_can_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();
        $this->loginAsVideoManager();

        $response = $this->get('/videos/' . $video->id);

        $response->assertSuccessful();
    }

    /**
     * @test
     */
    public function owner_users_can_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();
        $user = $this->loginAsRegularUser();

        $video->user_id = $user->id;
        $video->save();

        $response = $this->get('/videos/' . $video->id);

        $response->assertSuccessful();
    }

    /**
     * @test
     */
    public function not_owner_users_cannot_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();
        $loggedUser = $this->loginAsRegularUser();
        $user2 = User::create([
            'name' => 'Not Owner',
            'email' => 'pepe@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $video->user_id = $user2->id;
        $video->save();

        $response = $this->get('/videos/' . $video->id);

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function superadmin_can_view_unpublished_videos()
    {
        $video = $this->createUnpublishedVideo();
        $this->loginAsSuperAdmin();

        $response = $this->get('/videos/' . $video->id);

        $response->assertSuccessful();
    }

    /**
     * @return mixed
     */
    public function createPublishedVideo()
    {
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'serie_id' => 1
        ]);
        return $video;
    }

    /**
     * @return mixed
     */
    public function createUnPublishedVideo()
    {
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => null,
            'previous' => null,
            'next' => null,
            'serie_id' => 1
        ]);
        return $video;
    }
}
