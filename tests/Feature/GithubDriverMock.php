<?php

namespace Tests\Feature;

class GithubDriverMock
{
//    Laravel\Socialite\Two\User {#859 ▼
//    +token: "TOKEN_HERE"
//    +refreshToken: null
//    +expiresIn: null
//    +id: 4015406
//    +nickname: "acacha"
//    +name: "Sergi Tur Badenas"
//    +email: "sergiturbadenas@gmail.com"
//    +avatar: "https://avatars.githubusercontent.com/u/4015406?v=4"
//    +user: array:32 [▼
//    "login" => "acacha"
//    "id" => 4015406
//    "node_id" => "MDQ6VXNlcjQwMTU0MDY="
//    "avatar_url" => "https://avatars.githubusercontent.com/u/4015406?v=4"
//    "gravatar_id" => ""
//    "url" => "https://api.github.com/users/acacha"
//    "html_url" => "https://github.com/acacha"
//    "followers_url" => "https://api.github.com/users/acacha/followers"
//    "following_url" => "https://api.github.com/users/acacha/following{/other_user}"
//    "gists_url" => "https://api.github.com/users/acacha/gists{/gist_id}"
//    "starred_url" => "https://api.github.com/users/acacha/starred{/owner}{/repo}"
//    "subscriptions_url" => "https://api.github.com/users/acacha/subscriptions"
//    "organizations_url" => "https://api.github.com/users/acacha/orgs"
//    "repos_url" => "https://api.github.com/users/acacha/repos"
//    "events_url" => "https://api.github.com/users/acacha/events{/privacy}"
//    "received_events_url" => "https://api.github.com/users/acacha/received_events"
//    "type" => "User"
//    "site_admin" => false
//    "name" => "Sergi Tur Badenas"
//    "company" => "Acacha.org"
//    "blog" => "http://youtube.acacha.org"
//    "location" => "Tortosa, Tarragona, Catalunya"
//    "email" => "sergiturbadenas@gmail.com"
//    "hireable" => true
//    "bio" => "Computer Science Teacher and Open Source contributor in my free time. Creator of adminlte-laravel. Newsletter: https://sergiturbadenas.ck.page/797d91fd9"
//    "twitter_username" => "BadenasTur"
//    "public_repos" => 403
//    "public_gists" => 95
//    "followers" => 240
//    "following" => 284
//    "created_at" => "2013-03-30T20:10:11Z"
//    "updated_at" => "2022-01-11T19:20:11Z"
//    ]
//    }

    const ID = 4015406;
    const NAME = "Sergi Tur Badenas";
    const NICKNAME = "acacha";
    const AVATAR = "TODO";
    const EMAIL = "sergiturbadenas@gmail.com";
//    const EMAIL = "sergiturbadenas@gmail.com";
    const TOKEN = "TOKEN_HERE";
    const REFRESH_TOKEN = null;

    public $user;

    /**
     * @param $user
     */
    public function __construct($user = null)
    {
        if ($user) {
            $this->user = $user;
            return;
        }
        $this->setDefaultUser();
    }


    public function user()
    {
        return $this->user;
    }

    private function setDefaultUser()
    {
        $user = new \stdClass();
        $user->id = GithubDriverMock::ID;
        $user->email = GithubDriverMock::EMAIL;
        $user->name = GithubDriverMock::NAME;
        $user->avatar = GithubDriverMock::AVATAR;
        $user->nickname = GithubDriverMock::NICKNAME;
        $user->token = GithubDriverMock::TOKEN;
        $user->refreshToken = GithubDriverMock::REFRESH_TOKEN;
        $this->user = $user;
    }
}
