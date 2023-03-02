<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $newMessage = [];
    public $message = '';

    protected $rules = [
        'message' => 'required',
    ];

    public function render()
    {
        return view('livewire.chat');
    }

    public function getListeners()
    {
        return [
            "echo-presence:chat,MessageSent" => 'notifyNewMessage',
        ];
    }

    public function messageReceived()
    {
        $this->validate();

        $sender = Auth::user();

        broadcast(new MessageSent($sender, $this->message));

    }

    public function notifyNewMessage($event)
    {
        array_push($this->newMessage, $event['message']);
        // $this->newMessage = $event['message'];
        $this->reset('message');

    }
}
