<?php

namespace App\Listeners;

use App\Jobs\ProcessSeriesImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ScheduleSeriesImageProcessing
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->serie->image) {
            ProcessSeriesImage::dispatch($event->serie);
        }
    }
}
