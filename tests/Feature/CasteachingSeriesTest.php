<?php

namespace Tests\Feature;

use App\Models\Serie;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @covers CasteachingSeries::class
 *
 */
class CasteachingSeriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_users_can_see_published_series()
    {
        // 1 Preparació
        $serie1 = Serie::create([
            'title' => 'TDD (Test Driven Development)',
            'description' => 'Bla bla bla',
            'image' => 'tdd.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com'),
            'created_at' => Carbon::now()->addSeconds(1)
        ]);

        $serie2 = Serie::create([
            'title' => 'Crud amb Vue i Laravel',
            'description' => 'Bla bla bla',
            'image' => 'crud_amb_vue_laravel.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com'),
            'created_at' => Carbon::now()->addSeconds(2)
        ]);

        $serie3 = Serie::create([
            'title' => 'ionic Real world',
            'description' => 'Bla bla bla',
            'image' => 'ionic_real_world.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com'),
            'created_at' => Carbon::now()->addSeconds(3)
        ]);

        // 2 Execució
        $view = $this->blade('<x-casteaching-series/>');

        // 3 Comprovació

        $view->assertSeeInOrder([$serie3->title,$serie2->title,$serie1->title]);
        $view->assertSeeInOrder([$serie3->description,$serie2->description,$serie1->description]);
        $view->assertSeeInOrder([$serie3->teacher_name,$serie2->teacher_name,$serie1->teacher_name]);
        $view->assertSeeInOrder([$serie3->image,$serie2->image,$serie1->image]);
        $view->assertSeeInOrder([$serie3->teacher_photo_url,$serie2->teacher_photo_url,$serie1->teacher_photo_url]);

    }
}
