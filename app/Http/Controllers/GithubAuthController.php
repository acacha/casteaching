<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Tests\Feature\GithubAuthControllerTest;

class GithubAuthController extends Controller
{
    public static function testedBy()
    {
        return GithubAuthControllerTest::class;
    }

    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $error) {
            //Log::debug($error);
            // TODO -> TEST PER PROVAR AQUESTA lÍNIA
            return redirect('/login')->withErrors(['msg' => 'An Error occurred!' . $error->getMessage()]);
        }

        Auth::login(User::createUserFromGithub($githubUser));

        return redirect('/dashboard');
    }
}
