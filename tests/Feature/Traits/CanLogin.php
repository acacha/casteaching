<?php

namespace Tests\Feature\Traits;

use Illuminate\Support\Facades\Auth;

trait CanLogin
{
    private function loginAsSeriesManager()
    {
        Auth::login($user = create_series_manager_user());
        return $user;
    }

    private function loginAsVideoManager()
    {
        Auth::login($user = create_video_manager_user());
        return $user;
    }

    private function loginAsSuperAdmin()
    {
        Auth::login($user = create_superadmin_user());
        return $user;
    }

    private function loginAsRegularUser()
    {
        Auth::login($user = create_regular_user());
        return $user;
    }
}
