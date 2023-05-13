<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;

class ChatMessages extends Component
{
    public $messageCount = 0;
    private $chatRoom;
    public $oldMessages;
    public $newMessage;
    public $authUser;
    public $chatId;

    public function mount()
    {
        $this->authUser = auth()->user()->username;

        $this->chatRoom = Message::latest()->with(['media', 'user'])->where('chat_id', $this->chatId)->get();
        // dump($this->chatRoom);

        foreach ($this->chatRoom as $chat) {
            $this->oldMessages[] = [
                'sender' => $chat->user->username,
                'message' => $chat->text,
                'image' => $chat->user->getFirstMediaUrl('profile'),
                'sentAt' => $chat->created_at->diffForHumans(),
                'isAuthor' => ($chat->user->username === $this->authUser) ? 1 : 0,
            ];
        }

        if ($this->oldMessages) {
            $this->oldMessages = array_reverse($this->oldMessages);
        }
    }

    public function render()
    {
        // dump($this->messageCount);
        return view('livewire.chat-messages');
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->chatId},MessageSent" => 'notifyNewMessage',
            'resetCount' => 'resetCount'
        ];
    }

    public function increment()
    {
        $this->messageCount++;
        $this->emit('messageCountUpdated', $this->messageCount);
    }

    public function resetCount()
    {
        $this->messageCount = 0;
    }

    public function notifyNewMessage($event)
    {
        // dump($this->authUser);
        // dump($event);
        // array_push($this->newMessage, $event['message']);
        $this->newMessage[] = [
            'sender' => $event['sender'],
            'message' => $event['message'],
            'isAuthor' => ($event['sender'] === $this->authUser) ? 1 : 0,
        ];

        $this->increment();
        // dump($event['sender']);
        // dump($this->arrivedMsgCount);

        // dump($this->newMessage);
        // $this->newMessage = $event['message'];

    }
}
