<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Events\NotificationBox;
use App\Jobs\BroadcastMessage;
use App\Jobs\SaveMessage;
use App\Jobs\SendNotificationBox;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatInputField extends Component
{
    public $message = '';
    public $chatId;
    public $chatUuid;
    public $sender;
    public $senderImg;
    public $senderId;
    public $allChatUserIds;

    protected $rules = [
        'message' => 'required',
    ];

    public function mount()
    {
        $authUser = Auth::user();
        $this->sender = $authUser->username; //$authUser->full_name ?? $authUser->username
        $this->senderImg = $authUser->getFirstMediaUrl('profile', 'avatar');
        $this->senderId = $authUser->id;
        $chatId = $this->chatId;

        $this->allChatUserIds = User::whereHas('chats', function ($query) use ($chatId) {
            $query->where('chat_id', $chatId);
            })
            ->where('id', '<>', $authUser->id)
            ->pluck('id')
            ->toArray();
        // dump($authUser->id);
        // dump($this->chatUuid);
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
        SendNotificationBox::dispatch($this->sender, $this->senderImg, $this->allChatUserIds, $this->chatUuid);
        // NotificationBox::broadcast($this->sender, $this->allChatUserIds, $this->chatId);
        // dispatch(new BroadcastMessage($this->sender, $msg, $this->chatId));

    }
}
