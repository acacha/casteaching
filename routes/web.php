<?php

use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\VideosManageVueController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use GitHub\Sponsors\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ \App\Http\Controllers\LandingPageController::class,'show']);

Route::get('/videos/{id}', [ VideosController::class,'show']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/manage/videos', [ VideosManageController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');

    Route::post('/manage/videos',[ VideosManageController::class,'store' ])->middleware(['can:videos_manage_store']);
    Route::delete('/manage/videos/{id}',[ VideosManageController::class,'destroy' ])->middleware(['can:videos_manage_destroy']);
    Route::get('/manage/videos/{id}',[ VideosManageController::class,'edit' ])->middleware(['can:videos_manage_edit']);
    Route::put('/manage/videos/{id}',[ VideosManageController::class,'update' ])->middleware(['can:videos_manage_update']);



    Route::get('/manage/users', [ UsersManageController::class,'index'])->middleware(['can:users_manage_index'])
        ->name('manage.users');
    Route::post('/manage/users',[ UsersManageController::class,'store' ])->middleware(['can:users_manage_store']);
    Route::delete('/manage/users/{id}',[ UsersManageController::class,'destroy' ])->middleware(['can:users_manage_destroy']);


    Route::get('/vue/manage/videos', [ VideosManageVueController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.vue.videos');

    Route::post('/vue/manage/videos',[ VideosManageVueController::class,'store' ])->middleware(['can:videos_manage_store']);
    Route::delete('/vue/manage/videos/{id}',[ VideosManageVueController::class,'destroy' ])->middleware(['can:videos_manage_destroy']);
    Route::get('/vue/manage/videos/{id}',[ VideosManageVueController::class,'edit' ])->middleware(['can:videos_manage_edit']);
    Route::put('/vue/manage/videos/{id}',[ VideosManageVueController::class,'update' ])->middleware(['can:videos_manage_update']);
});

Route::get('/github_sponsors', function () {
    $client = app(Client::class);
    dump($sponsors = $client->login('acacha')->sponsors());
    foreach ($sponsors as $sponsor) {
        dump($sponsor['avatarUrl']); // The sponsor's GitHub avatar url...
        dump($sponsor['name']); // The sponsor's GitHub name...
    }

    dump($sponsors = $client->login('driesvints')->sponsors());
    foreach ($sponsors as $sponsor) {
        dump($sponsor);
    }

    dd($client->login('acacha')->isSponsoredBy('acacha'));
});


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    try {
        $githubUser = Socialite::driver('github')->user();
    } catch (\Exception $error) {
//        Log::debug($error);
        return redirect('/login')->withErrors(['msg' => 'An Error occurred!' . $error->getMessage()]);
    }

//    $user = User::createUserFromGithub($githubUser);
    $user = User::where('github_id', $githubUser->id)->first();

//    if ($user) {
//        $user->github_token = $githubUser->token;
//        $user->github_refresh_token = $githubUser->refreshToken;
//        $user->github_nickname = $githubUser->nickname;
//        $user->github_avatar = $githubUser->avatar;
//        $user->save();
//        add_personal_team($user);
//    } else {
//        $user = User::where('email', $githubUser->email)->first();
//        if ($user) {
//            $user->github_id = $githubUser->id;
//            $user->github_nickname = $githubUser->nickname;
//            $user->github_avatar = $githubUser->avatar;
//            $user->github_token = $githubUser->token;
//            $user->github_refresh_token = $githubUser->refreshToken;
//            $user->save();
//        } else {
//            $user = User::create([
//                'name' => $githubUser->name,
//                'email' => $githubUser->email,
//                'password' => Hash::make(Str::random()),
//                'github_id' => $githubUser->id,
//                'github_token' => $githubUser->token,
//                'github_refresh_token' => $githubUser->refreshToken,
//            ]);
//        }
//    }
//
//    add_personal_team($user);

    Auth::login($user);

    return redirect('/dashboard');
});

