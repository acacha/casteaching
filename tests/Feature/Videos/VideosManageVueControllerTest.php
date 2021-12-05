<?php

namespace Tests\Feature\Videos;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class VideosManageVueControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /** @test */
    public function user_with_permission_can_manage_videos_index()
    {
        $videos = create_sample_videos();

        $this->loginAsVideoManager();

        $response = $this->get('/vue/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.vue.index');

        $response->assertViewMissing('videos');

        // TODO -> Not working per la carrega asíncrona
        // SSR? Explain
        foreach ($videos as $video) {
            $response->assertSee($video->id);
            $response->assertSee($video->title);
        }
    }

    /** @test */
    public function regular_users_cannot_manage_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->get('/vue/manage/videos');
        $response->assertstatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_videos()
    {
        $response = $this->get('/vue/manage/videos');
        $response->assertRedirect(route('login'));
    }
}
