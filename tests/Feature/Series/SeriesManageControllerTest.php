<?php

namespace Tests\Feature\Series;

use App\Events\SerieCreated;
use App\Events\VideoCreated;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\SeriesManageController
 */
class SeriesManageControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /** @test  */
    public function user_with_permissions_can_update_series()
    {
        $this->loginAsSeriesManager();
        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        // URI ENDPOINT -> API -> FUNCTION
        $response = $this->put('/manage/series/' . $serie->id,[
                'title' => 'TDD 102',
                'description' => "Aprèn tot sobre TDD 2",
                'image' => 'serieTDD2.png',
            ]
        );

        $response->assertRedirect(route('manage.series'));
        $response->assertSessionHas('status', 'Successfully updated');


        $newSerie = Serie::find($serie->id);
        $this->assertEquals('TDD 102', $newSerie->title);
        $this->assertEquals('Aprèn tot sobre TDD 2', $newSerie->description);
        $this->assertEquals('serieTDD2.png', $newSerie->image);
        $this->assertEquals($serie->id, $newSerie->id);

    }

    /** @test  */
    public function user_with_permissions_can_see_edit_series()
    {
        $this->loginAsSeriesManager();
        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        $response = $this->get('/manage/series/' . $serie->id);

        $response->assertStatus(200);
        $response->assertViewIs('series.manage.edit');
        $response->assertViewHas('serie', function($v) use ($serie) {
            return $serie->is($v);
        });

        $response->assertSee('<form data-qa="form_serie_edit"',false);

        $response->assertSeeText($serie->title);
        $response->assertSeeText($serie->description);

    }

    /** @test  */
    public function user_with_permissions_can_destroy_series() {
        $this->loginAsSeriesManager();
        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        $response = $this->delete('/manage/series/' . $serie->id);

        $response->assertRedirect(route('manage.series'));
        $response->assertSessionHas('status', 'Successfully removed');

        $this->assertNull(Serie::find($serie->id));
        $this->assertNull($serie->fresh());

    }

    /** @test  */
    public function user_without_permissions_cannot_destroy_series() {
        $this->loginAsRegularUser();
        $serie = Serie::create([
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        $response = $this->delete('/manage/series/' . $serie->id);

        $response->assertStatus(403);
    }

    /** @test  */
    public function user_without_permissions_cannot_store_series() {
        $this->loginAsRegularUser();

        $serie = objectify($serieArray = [
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        $response = $this->post('/manage/series',$serieArray);

        $response->assertStatus(403);
    }

    /** @test  */
    public function user_with_permissions_can_store_series()
    {
        $this->loginAsSeriesManager();

        $serie = objectify($serieArray = [
            'title' => 'TDD 101',
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
            'teacher_name' => 'Sergi Tur'
        ]);

        Event::fake();
        $response = $this->post('/manage/series',$serieArray);

        Event::assertDispatched(SerieCreated::class);

        $response->assertRedirect(route('manage.series'));
        $response->assertSessionHas('status', 'Successfully created');

        $serieDB = Serie::first();

        $this->assertNotNull($serieDB);
        $this->assertEquals($serieDB->title,$serie->title);
        $this->assertEquals($serieDB->description,$serie->description);
        $this->assertEquals($serieDB->image,$serie->image);
        $this->assertNull($serie->published_at);

    }

    /** @test */
    public function title_is_required()
    {
        $this->loginAsSeriesManager();
        // Execució
        $response = $this->post('/manage/series',[
            'description' => 'Aprèn tot sobre TDD',
            'image' => 'serieTDD.png',
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function description_is_required()
    {
        $this->loginAsSeriesManager();
        // Execució
        $response = $this->post('/manage/series',[
            'title' => 'TDD 101',
            'image' => 'serieTDD.png',
        ]);

        $response->assertSessionHasErrors(['description']);
    }

    /** @test  */
    public function user_with_permissions_can_see_add_series()
    {
        $this->loginAsSeriesManager();

        $response = $this->get('/manage/series');

        $response->assertStatus(200);
        $response->assertViewIs('series.manage.index');

        $response->assertSee('<form data-qa="form_serie_create"',false);
    }

    /** @test  */
    public function user_without_series_manage_create_cannot_see_add_series()
    {
        Permission::firstOrCreate(['name' => 'series_manage_index']);
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'Pepe',
            'password' => Hash::make('12345678')
        ]);
        $user->givePermissionTo('series_manage_index');
        add_personal_team($user);

        Auth::login($user);

        $response = $this->get('/manage/series');

        $response->assertStatus(200);
        $response->assertViewIs('series.manage.index');

        $response->assertDontSee('<form data-qa="form_serie_create"',false);
    }

    /** @test */
    public function user_with_permissions_can_manage_series()
    {
        $this->loginAsSeriesManager();

        $series = create_sample_series();

        $response = $this->get('/manage/series');

        $response->assertStatus(200);
        $response->assertViewIs('series.manage.index');
        $response->assertViewHas('series',function($v) use ($series) {
            return $v->count() === count($series) && get_class($v) === Collection::class &&
                get_class($series[0]) === Serie::class;
        });

        foreach ($series as $serie) {
            $response->assertSee($serie->id);
            $response->assertSee($serie->title);
        }
    }

//    /** @test */
//    public function user_with_permissions_can_manage_series_and_see_serie()
//    {
//        $this->loginAsSeriesManager();
//
//        $series = create_sample_series();
//
//        $serie = Serie::create([
//            'title' => 'TDD (Test Driven Development)',
//            'description' => 'Bla bla bla',
//            'image' => 'tdd.png',
//            'teacher_name' => 'Sergi Tur Badenas',
//            'teacher_photo_image' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
//        ]);
//
//        $series[0]->setSerie($serie);
//
//        $response = $this->get('/manage/series');
//
//        $response->assertStatus(200);
//        $response->assertViewIs('series.manage.index');
//        $response->assertViewHas('series',function($v) use ($series) {
//            return $v->count() === count($series) && get_class($v) === Collection::class &&
//                get_class($series[0]) === Serie::class;
//        });
//
//        foreach ($series as $serie) {
//            $response->assertSee($serie->id);
//            $response->assertSee($serie->title);
//        }
//        dump($series[0]->fresh()->serie->title);
//        dd($response->getContent());
//        $response->assertSee($series[0]->fresh()->serie->title);
//    }

    /** @test */
    public function regular_users_cannot_manage_series()
    {
        $this->loginAsRegularUser();
        $response = $this->get('/manage/series');
        $response->assertstatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_series()
    {
        $response = $this->get('/manage/series');
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function superadmins_can_manage_series()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get('/manage/series');

        $response->assertStatus(200);
        $response->assertViewIs('series.manage.index');
    }
}
