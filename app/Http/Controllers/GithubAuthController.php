<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tests\Feature\GithubAuthControllerTest;

class GithubAuthController extends Controller
{
    public static function testedBy()
    {
        return GithubAuthControllerTest::class;
    }
}
