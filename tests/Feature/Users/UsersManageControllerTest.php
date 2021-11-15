<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\UsersManageController
 */
class UsersManageControllerTest extends TestCase
{
    use RefreshDatabase;

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
