<?php

namespace App\Events;

use App\Models\Client\ClientSpecs;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SpecsAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $clientSpecs;

    /**
     * Create a new event instance.
     *
     * @param ClientSpecs $clientSpecs
     */
    public function __construct(ClientSpecs $clientSpecs)
    {
        $this->clientSpecs = $clientSpecs;
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
