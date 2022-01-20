<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @covers LandingPageController::class
 */
class LandingPageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function landing_page_have_a_casteaching_series_component()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('welcome');

        $response->assertSee('id="casteaching_series"',false);

    }
}
