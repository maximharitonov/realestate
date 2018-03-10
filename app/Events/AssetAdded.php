<?php

namespace App\Events;

use App\Models\Asset\AssetInfo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AssetAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $assetInfo;

    /**
     * Create a new event instance.
     * @param AssetInfo $assetInfo
     */
    public function __construct(AssetInfo $assetInfo)
    {
        $this->assetInfo = $assetInfo;
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
