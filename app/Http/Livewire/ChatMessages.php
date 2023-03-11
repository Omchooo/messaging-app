<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatMessages extends Component
{
    public $newMessage;
    public $authUser;

    public function mount()
    {
        $this->authUser = auth()->user()->username;
    }

    public function render()
    {
        return view('livewire.chat-messages');
    }

    public function getListeners()
    {
        return [
            "echo-presence:chat,MessageSent" => 'notifyNewMessage',
        ];
    }

    public function notifyNewMessage($event)
    {
        // dump($this->authUser);
        // dump($event);
        // array_push($this->newMessage, $event['message']);
        $this->newMessage[] = [
            'sender' => $event['user'],
            'message' => $event['message'],
            'isAuthor' => ($event['user'] === $this->authUser) ? 1 : 0,
        ];


        // dump($this->newMessage);
        // $this->newMessage = $event['message'];

    }
}
