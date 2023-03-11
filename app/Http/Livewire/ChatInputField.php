<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Jobs\BroadcastMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatInputField extends Component
{
    public $message = '';

    protected $rules = [
        'message' => 'required',
    ];

    public function render()
    {
        return view('livewire.chat-input-field');
    }

    public function messageReceived()
    {
        $this->validate();

        $msg = $this->message;
        $this->reset('message');
        $sender = Auth::user()->username;
        // dump(Auth::user()->id);
        // dump($this->message);
        // \Log::debug('Broadcasting message', ['sender' => $sender, 'message' => $this->message]);
        BroadcastMessage::dispatch($sender, $msg);
        // broadcast(new MessageSent($sender, $this->message));

        // dispatch(new BroadcastMessage($sender, $this->message));

    }


}
