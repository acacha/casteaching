<?php

namespace App\Listeners;

use App\Notifications\VideoCreated;
use Illuminate\Support\Facades\Notification;
use Tests\Unit\SendVideoCreatedNotificationTest;

class SendVideoCreatedNotificationTODO
{
    private $video;

    /**
     * @param $video
     */
    public function __construct($video)
    {
        $this->video = $video;
    }


    public static function testedBy()
    {
        return SendVideoCreatedNotificationTest::class;
    }

    function handle() {
        Notification::route('mail', config('casteaching.admins'))->notify(new VideoCreated($this->video));
    }
}
