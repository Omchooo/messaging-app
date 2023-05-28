<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Jobs\BroadcastMessage;
use App\Jobs\SaveMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatInputField extends Component
{
    public $message = '';
    public $chatId;
    public $sender;
    public $senderId;
    public $uuid;

    protected $rules = [
        'message' => 'required',
    ];

    public function mount()
    {
        $authUser = auth()->user();
        $this->sender = $authUser->username;
        $this->senderId = $authUser->id;
    }

    public function render()
    {
        // dump($this->chatId);
        return view('livewire.chat-input-field');
    }

    public function messageReceived()
    {
        $this->validate();

        $msg = $this->message;
        $this->reset('message');

        // dump($this->chatId);
        // dump(Auth::user()->id);
        // dump($this->message);
        // \Log::debug('Broadcasting message', ['sender' => $sender, 'message' => $msg, 'chatId' => $this->chatId]);
        BroadcastMessage::dispatch($this->sender, $msg, $this->chatId);
        SaveMessage::dispatch($this->senderId, $msg, $this->chatId);

        // broadcast(new MessageSent($sender, $this->message));

        // dispatch(new BroadcastMessage($sender, $this->message));

    }


}
