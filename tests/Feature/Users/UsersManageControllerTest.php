<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\UsersManageController
 */
class UsersManageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function user_with_permissions_can_destroy_users() {
        $this->loginAsUserManager();
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'pepe@prova.com',
            'password' => Hash::make('12345678')
        ]);

        $response = $this->delete('/manage/users/' . $user->id);

        $response->assertRedirect(route('manage.users'));
        $response->assertSessionHas('status', 'Successfully removed');

        $this->assertNull(User::find($user->id));
        $this->assertNull($user->fresh());

    }

    /** @test  */
    public function user_without_permissions_cannot_destroy_users() {
        $this->loginAsRegularUser();
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'pepe@prova.com',
            'password' => Hash::make('12345678')
        ]);

        $response = $this->delete('/manage/users/' . $user->id);

        $response->assertStatus(403);
    }

    /** @test  */
    public function user_without_permissions_cannot_store_users() {
        $this->loginAsRegularUser();

        $user = objectify($userArray = [
            'name' => 'Pepe',
            'email' => 'pepe@prova.com',
            'password' => Hash::make('12345678')
        ]);

        $response = $this->post('/manage/users',$userArray);

        $response->assertStatus(403);
    }

    /** @test  */
    public function user_with_permissions_can_store_users()
    {
        $this->loginAsUserManager();

        $user = objectify($userArray = [
            'name' => 'Pepe',
            'email' => 'pepe@prova.com',
            'password' => Hash::make('12345678')
        ]);

        $response = $this->post('/manage/users',$userArray);

        $response->assertRedirect(route('manage.users'));
        $response->assertSessionHas('status', 'Successfully created');

        $userDB = User::first();

        $this->assertNotNull($userDB);
        $this->assertEquals($userDB->title,$user->title);
        $this->assertEquals($userDB->description,$user->description);
        $this->assertEquals($userDB->url,$user->url);
        $this->assertNull($user->published_at);

    }

    /** @test  */
    public function user_with_permissions_can_see_add_users()
    {
        $this->loginAsUserManager();

        $response = $this->get('/manage/users');

        $response->assertStatus(200);
        $response->assertViewIs('users.manage.index');

        $response->assertSee('<form data-qa="form_user_create"',false);
    }

    /** @test  */
    public function user_without_users_manage_create_cannot_see_add_users()
    {
        Permission::firstOrCreate(['name' => 'users_manage_index']);
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'Pepe',
            'password' => Hash::make('12345678')
        ]);
        $user->givePermissionTo('users_manage_index');
        add_personal_team($user);

        Auth::login($user);

        $response = $this->get('/manage/users');

        $response->assertStatus(200);
        $response->assertViewIs('users.manage.index');

        $response->assertDontSee('<form data-qa="form_user_create"',false);
    }

    /** @test */
    public function user_with_permissions_can_manage_users()
    {
        $this->loginAsUserManager();

        $users = create_sample_users();

        $response = $this->get('/manage/users');

        $response->assertStatus(200);
        $response->assertViewIs('users.manage.index');
        $response->assertViewHas('users',function($u) use ($users) {
            return $u->count() === (count($users) +1 ) && get_class($u) === Collection::class &&
                get_class($users[0]) === User::class;
        });

        foreach ($users as $user) {
            $response->assertSee($user->id);
            $response->assertSee($user->name);
            $response->assertSee($user->email);
        }
    }

    /** @test */
    public function regular_users_cannot_manage_users()
    {
        $this->loginAsRegularUser();
        $response = $this->get('/manage/users');
        $response->assertstatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_users()
    {
        $response = $this->get('/manage/users');
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function superadmins_can_manage_users()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get('/manage/users');

        $response->assertStatus(200);
        $response->assertViewIs('users.manage.index');
    }

    private function loginAsUserManager()
    {
        Auth::login(create_user_manager_user());
    }

    private function loginAsSuperAdmin()
    {
        Auth::login(create_superadmin_user());
    }

    private function loginAsRegularUser()
    {
        Auth::login(create_regular_user());
    }
}
