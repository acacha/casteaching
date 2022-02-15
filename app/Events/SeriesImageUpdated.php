<?php

namespace App\Events;

use App\Models\Serie;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesImageUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Serie $serie;

    /**
     * @param Serie $serie
     */
    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
