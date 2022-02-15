<?php

use App\Models\Serie;
use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

if (! function_exists('create_default_user')) {
    function create_default_user()
    {
        $user = User::create([
            'name' => config('casteaching.default_user.name', 'Sergi Tur Badenas'),
            'email' => config('casteaching.default_user.email','sergiturbadenas@gmail.com'),
            'password' => Hash::make(config('casteaching.default_user.password','12345678'))
        ]);

        $user->superadmin = true;
        $user->save();

        add_personal_team($user);
    }
}

if (! function_exists('create_default_videos')) {
    function create_default_videos()
    {
        Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://www.youtube.com/embed/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'serie_id' => 1
        ]);
    }
}

if (! function_exists('create_regular_user')) {
    function create_regular_user()
    {
        $user = User::create([
            'name' => 'Pepe Pringao',
            'email' => 'pringao@casteaching.com',
            'password' => Hash::make('12345678')
        ]);

        add_personal_team($user);

        return $user;
    }
}

if (! function_exists('create_series_manager_user')) {
    function create_series_manager_user() {
        $user = User::create([
            'name' => 'SeriesManager',
            'email' => 'seriesmanager@casteaching.com',
            'password' => Hash::make('12345678')
        ]);

        Permission::create(['name' => 'series_manage_index']);
        Permission::create(['name' => 'series_manage_show']);
        Permission::create(['name' => 'series_manage_create']);
        Permission::create(['name' => 'series_manage_store']);
        Permission::create(['name' => 'series_manage_edit']);
        Permission::create(['name' => 'series_manage_update']);
        Permission::create(['name' => 'series_manage_destroy']);
        $user->givePermissionTo('series_manage_index');
        $user->givePermissionTo('series_manage_show');
        $user->givePermissionTo('series_manage_create');
        $user->givePermissionTo('series_manage_store');
        $user->givePermissionTo('series_manage_destroy');
        $user->givePermissionTo('series_manage_edit');
        $user->givePermissionTo('series_manage_update');

        add_personal_team($user);
        return $user;
    }
}

if (! function_exists('create_video_manager_user')) {
    function create_video_manager_user() {
        $user = User::create([
            'name' => 'VideosManager',
            'email' => 'videosmanager@casteaching.com',
            'password' => Hash::make('12345678')
        ]);

        Permission::create(['name' => 'videos_manage_index']);
        Permission::create(['name' => 'videos_manage_show']);
        Permission::create(['name' => 'videos_manage_create']);
        Permission::create(['name' => 'videos_manage_store']);
        Permission::create(['name' => 'videos_manage_edit']);
        Permission::create(['name' => 'videos_manage_update']);
        Permission::create(['name' => 'videos_manage_destroy']);
        $user->givePermissionTo('videos_manage_index');
        $user->givePermissionTo('videos_manage_show');
        $user->givePermissionTo('videos_manage_create');
        $user->givePermissionTo('videos_manage_store');
        $user->givePermissionTo('videos_manage_destroy');
        $user->givePermissionTo('videos_manage_edit');
        $user->givePermissionTo('videos_manage_update');

        add_personal_team($user);
        return $user;
    }
}

if (! function_exists('create_user_manager_user')) {
    function create_user_manager_user() {
        $user = User::create([
            'name' => 'UsersManager',
            'email' => 'usersmanager@casteaching.com',
            'password' => Hash::make('12345678')
        ]);

        Permission::create(['name' => 'users_manage_index']);
        Permission::create(['name' => 'users_manage_create']);
        Permission::create(['name' => 'users_manage_store']);
        Permission::create(['name' => 'users_manage_destroy']);
        $user->givePermissionTo('users_manage_index');
        $user->givePermissionTo('users_manage_create');
        $user->givePermissionTo('users_manage_store');
        $user->givePermissionTo('users_manage_destroy');

        add_personal_team($user);
        return $user;
    }
}


if (! function_exists('create_superadmin_user')) {
    function create_superadmin_user() {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@casteaching.com',
            'password' => Hash::make('12345678')
        ]);
        $user->superadmin = true;
        $user->save();

        add_personal_team($user);

        return $user;
    }
}

if (! function_exists('add_personal_team')) {
    /**
     * @param $user
     */
    function add_personal_team($user): void
    {
        try {
            Team::forceCreate([
                'name' => $user->name . "'s Team",
                'user_id' => $user->id,
                'personal_team' => true
            ]);
        } catch (\Exception $exception) {
//            dd($exception->getMessage());
        }
    }
}


if (! function_exists('define_gates')) {
    function define_gates() {

        Gate::before(function ($user, $ability) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });


    }
}

if (! function_exists('create_permissions')) {
    function create_permissions() {
        Permission::firstOrCreate(['name' => 'videos_manage_index']);
        Permission::firstOrCreate(['name' => 'videos_manage_create']);
        Permission::firstOrCreate(['name' => 'videos_manage_store']);
        Permission::firstOrCreate(['name' => 'videos_manage_destroy']);
        Permission::firstOrCreate(['name' => 'videos_manage_edit']);
        Permission::firstOrCreate(['name' => 'videos_manage_update']);
    }
}

if (! function_exists('create_sample_video')) {
    function create_sample_video() {
        return Video::create([
            'title' => 'TDD 115',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/jKMTRtkXAF0'
        ]);
    }
}

if (! function_exists('create_sample_videos')) {
    function create_sample_videos() {
        $video1 = Video::create([
            'title' => 'TDD 115',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/jKMTRtkXAF0'
        ]);
        $video2 = Video::create([
            'title' => 'Laravel JetStream',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/zyABmm6Dw64'
        ]);
        $video3 = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Header 1
            Bla bla bla

            # Header 2

            Bla bla bla 2',
            'url' => 'https://www.youtube.com/embed/w8j07_DBl_I'
        ]);
        return [$video1, $video2, $video3];
    }
}

if (! function_exists('create_sample_users')) {
    function create_sample_users() {
        $user1 = User::create([
            'name' => 'User 1',
            'email' => 'user1@prova.com',
            'password' => Hash::make('12345678')
        ]);
        $user2 = User::create([
            'name' => 'User 2',
            'email' => 'user2@prova.com',
            'password' => Hash::make('12345678')
        ]);
        $user3 = User::create([
            'name' => 'User 3',
            'email' => 'user3@prova.com',
            'password' => Hash::make('12345678')
        ]);

        return [$user1, $user2, $user3];
    }
}

class DomainObject implements ArrayAccess, JsonSerializable
{
    private $data = [];

    /**
     * DomainObject constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function __toString()
    {
        return (string) collect($this->data);
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->data;
    }
}


if (! function_exists('objectify')) {
    function objectify($array)
    {
        return new DomainObject($array);
    }
}


if (! function_exists('create_placeholder_series_image')) {
    function create_placeholder_series_image()
    {
        return Storage::disk('public')->putFileAs('series', new File(base_path('/series_photos/placeholder.png')),'placeholder.png');
    }
}

if (! function_exists('create_sample_series')) {
    function create_sample_series()
    {
        $path = Storage::disk('public')->putFile('series', new File(base_path('series_photos/tdd.png')));
        $serie1 = Serie::create([
            'title' => 'TDD (Test Driven Development)',
            'description' => 'Bla bla bla',
            'image' => $path,
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
        ]);

        sleep(1);
        $path = Storage::disk('public')->putFile('series', new File(base_path('series_photos/crud_amb_vue_laravel.png')));

        $serie2 = Serie::create([
            'title' => 'Crud amb Vue i Laravel',
            'description' => 'Bla bla bla',
            'image' => $path,
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
        ]);

        sleep(1);
        $path = Storage::disk('public')->putFile('series', new File(base_path('series_photos/ionic_real_world.png')));

        $serie3 = Serie::create([
            'title' => 'ionic Real world',
            'description' => 'Bla bla bla',
            'image' => $path,
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com')
        ]);

        sleep(1);

        $serie4 = Serie::create([
            'title' => 'Serie TODO',
            'description' => 'Bla bla bla',
        ]);

        return [$serie1,$serie2,$serie3,$serie4];
    }
}

