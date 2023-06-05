<?php

namespace App\Jobs;

use App\Events\NotificationBox;
use App\Models\Chat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationBox implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sender;
    public $senderImg;
    public $receiverIds;
    public $chatRoom;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender, $senderImg, $receiverIds, $chatRoom)
    {
        $this->sender = $sender;
        $this->senderImg = $senderImg;
        $this->receiverIds = $receiverIds;
        $this->chatRoom = $chatRoom;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // \Log::debug("{$this->sender}, room id: {$this->chatRoom}");

       foreach ($this->receiverIds as $receiverId) {
            broadcast(new NotificationBox($this->sender, $this->senderImg, $receiverId, $this->chatRoom));
        }
    }
}
