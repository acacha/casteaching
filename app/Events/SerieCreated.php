<?php

namespace App\Events;

use App\Models\Serie;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SerieCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Serie $serie;

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
