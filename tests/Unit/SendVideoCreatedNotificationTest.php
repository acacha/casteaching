<?php

namespace Tests\Unit;

use App\Listeners\SendVideoCreatedNotificationTODO;
use App\Notifications\VideoCreated;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Tests\TestCase;

/**
 * @covers SendVideoCreatedNotificationTODO::class
 */
class SendVideoCreatedNotificationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function handle_send_video_created_notification()
    {
        $sender = new SendVideoCreatedNotificationTODO($video=create_sample_video());

        Notification::fake();
        $sender->handle();

        $admins = config('casteaching.admins');

        Notification::assertSentTo(
            new AnonymousNotifiable, VideoCreated::class,
            function ($notification, $channels, $notifiable) use ($admins, $video) {
                return in_array('mail',$channels) && ($notifiable->routes['mail'] === $admins) && Str::contains($notification->toMail($notifiable)->render(), $video->title);
            }
        );


    }
}
