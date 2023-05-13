<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;
    public $chatId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender, $message, $chatId)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->chatId = $chatId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // \Log::debug("{$this->sender->username}: {$this->message}");

        return new PrivateChannel("chat.{$this->chatId}");
    }
}
