<?php

namespace App\Providers;

use App\Events\SeriesImageUpdated;
use App\Listeners\ScheduleSeriesImageProcessing;
use App\Listeners\SendVideoCreatedNotification;
use App\Events\VideoCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        VideoCreated::class => [
            SendVideoCreatedNotification::class,
            // TODO esborrar
//            ProcessVideo::class
        ],
        SeriesImageUpdated::class => [
            ScheduleSeriesImageProcessing::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
