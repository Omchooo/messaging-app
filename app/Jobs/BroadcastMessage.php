<?php

namespace App\Jobs;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BroadcastMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sender;
    public $message;
    public $chatId;


    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // \Log::debug("{$this->sender->username}: {$this->message}, room id: {$this->chatId}");

        broadcast(new MessageSent($this->sender, $this->message, $this->chatId));
    }
}
