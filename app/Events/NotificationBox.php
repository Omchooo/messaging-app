<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationBox implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $senderImg;
    public $receiverId;
    public $chatRoom;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender, $senderImg, $receiverId, $chatRoom)
    {
        $this->sender = $sender;
        $this->senderImg = $senderImg;
        $this->receiverId = $receiverId;
        $this->chatRoom = $chatRoom;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("user.chat.box.{$this->receiverId}");
    }
}
