<?php

use App\Http\Controllers\GithubAuthController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\VideosManageVueController;
use GitHub\Sponsors\Client;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/auth/redirect', [GithubAuthController::class,'redirect']);

Route::get('/auth/callback', [GithubAuthController::class,'callback']);

