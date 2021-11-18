<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosApiController::class
 */
class VideoApiTest extends TestCase
{
    use RefreshDatabase;

    /** UPDATE */

    /** @test */
    public function guest_users_cannot_update_videos()
    {
        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);
        $response = $this->putJson('/api/videos/' . $video->id);

        $response
            ->assertStatus(401);

        $this->assertNotNull(Video::find($video->id));

    }

    /** @test */
    public function regular_users_cannot_update_videos()
    {
        $this->loginAsRegularUser();
        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);
        $response = $this->putJson('/api/videos/' . $video->id);

        $response
            ->assertStatus(403);
    }

    /** @test */
    public function returns_404_when_updating_and_unexisting_video()
    {
        $this->loginAsVideoManager();

        $response = $this->putJson('/api/videos/999');

        $response
            ->assertStatus(404);

    }

    /** @test */
    public function user_with_permission_can_update_videos()
    {
        $this->loginAsVideoManager();

        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

        $response = $this->putJson('/api/videos/' . $video->id, $newVideo = [
            'title' => 'TDD 101 new',
            'description' => 'Bla bla bla new',
            'url' => 'https://youtu.be/ednlsVl-NHA/new'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('id')
                ->where('title', $newVideo['title'])
                ->where('description', $newVideo['description'])
                ->where('url', $newVideo['url'])
                ->etc()
            );

        $this->assertNotNull($dbVideo = Video::find($response['id']));
        $this->assertEquals($video->id,$dbVideo->id);
        $this->assertEquals($newVideo['title'],$dbVideo->title);
        $this->assertEquals($newVideo['description'],$dbVideo->description);
        $this->assertEquals($newVideo['url'],$dbVideo->url);

    }

    /** DESTROY */

    /** @test */
    public function guest_users_cannot_destroy_videos()
    {
        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);
        $response = $this->putJson('/api/videos/' . $video->id);

        $response
            ->assertStatus(401);

        $newVideo = Video::find($video->id);

        $this->assertEquals($newVideo->id, $video->id);
        $this->assertEquals($newVideo->title, $video->title);
        $this->assertEquals($newVideo->description, $video->description);
        $this->assertEquals($newVideo->url, $video->url);

    }
    /** @test */
    public function regular_users_cannot_destroy_videos()
    {
        $this->loginAsRegularUser();
        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);
        $response = $this->putJson('/api/videos/' . $video->id);

        $response
            ->assertStatus(403);

        $newVideo = Video::find($video->id);

        $this->assertEquals($newVideo->id, $video->id);
        $this->assertEquals($newVideo->title, $video->title);
        $this->assertEquals($newVideo->description, $video->description);
        $this->assertEquals($newVideo->url, $video->url);

    }

    /** @test */
    public function returns_404_when_destroying_and_unexisting_video()
    {
        $this->loginAsVideoManager();

        $response = $this->putJson('/api/videos/999');

        $response
            ->assertStatus(404);

    }

    /** @test */
    public function user_with_permission_can_destroy_videos()
    {
        $this->loginAsVideoManager();

        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

        $response = $this->deleteJson('/api/videos/' . $video->id);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('id')
                ->where('title', $video['title'])
                ->where('url', $video['url'])
                ->etc()
            );

        $this->assertNull(Video::find($response['id']));

    }

    /** STORE */

    /** @test */
    public function regular_users_cannot_store_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->postJson('/api/videos', $video = [
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

        $response
            ->assertStatus(403);

        $this->assertCount(0,Video::all());

    }

    /** @test */
    public function guest_users_cannot_store_videos()
    {
        $response = $this->postJson('/api/videos', $video = [
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

        $response
            ->assertStatus(401);

        $this->assertCount(0,Video::all());

    }

    /** @test */
    public function user_with_permission_can_store_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->postJson('/api/videos', $video = [
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('id')
                    ->where('title', $video['title'])
                    ->where('url', $video['url'])
                    ->etc()
                );

        $newVideo = Video::find($response['id']);

        $this->assertEquals($response['id'],$newVideo->id);
        $this->assertEquals($response['title'],$newVideo->title);
        $this->assertEquals($response['description'],$newVideo->description);
        $this->assertEquals($response['url'],$newVideo->url);
    }

    /** INDEX */

    /** @test */
    public function guest_users_can_index_published_videos()
    {
        $videos = create_sample_videos();

        $response = $this->get('/api/videos');

        $response->assertStatus(200);

        $response->assertJsonCount(count($videos));
    }

    /** SHOW */
    
    /** @test */
    public function guest_users_can_show_published_videos()
    {
//        $this->withoutExceptionHandling();
        $video  = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/ednlsVl-NHA'
        ]);

//        $response = $this->get('/api/videos/' . $video->id);
//        $response = $this->json('GET','/api/videos/' . $video->id);
        $response = $this->getJson('/api/videos/' . $video->id);

        $response->assertStatus(200);

        $response->assertSee($video->title);
        $response->assertSee($video->description);
        $response->assertSee($video->id);

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('id', $video->id)
                ->where('title', $video->title)
                ->where('url', $video->url)
//                ->missing('password')
                ->etc()
            );

//        $response->assertJsonPath('title', $video->title);
    }

    /** @test */
    public function guest_users_cannot_show_unexisting_videos()
    {
        $response = $this->get('/api/videos/999');

        $response->assertStatus(404);
    }

    private function loginAsVideoManager()
    {
        Auth::login(create_video_manager_user());
    }

    private function loginAsRegularUser()
    {
        Auth::login(create_regular_user());
    }
}
