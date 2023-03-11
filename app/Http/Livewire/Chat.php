<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Models\Chat as ModelsChat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    private $allChatRooms;
    public $users;
    public $chatid;

    public function mount($uuid)
    {
        $this->chatid = $uuid;
        // dump($this->chatid);
        // dump($chat->uuid);
        // $this->chatRoom = Chat::latest()->where('uuid', $chat);


        DB::enableQueryLog();
        $authChatIds = ModelsChat::where('user_id', auth()->user()->id)
            // ->orderBy('updated_at', 'desc')
            ->pluck('uuid');


        // foreach ($authChatIds as $chatId) {
        $this->allChatRooms = User::whereHas('chats', function ($query) use ($authChatIds) {
            $query->whereIn('uuid', $authChatIds);
        })
            ->with('chats', function ($query) use ($authChatIds) {
                $query->whereIn('uuid', $authChatIds);
            })
            ->with('media')
            ->where('id', '<>', auth()->user()->id)
            ->get();
        dump($this->allChatRooms);
        // }

        foreach ($this->allChatRooms as $chatRoom) {
            // dump(['username' => $chatRoom->username, 'full name' => $chatRoom->fullname, 'chat uuid' => $chatRoom->chats[0]->uuid]);
            $this->users[] = [
                'username' => $chatRoom->username,
                'fullName' => $chatRoom->fullname,
                'chatId' => $chatRoom->chats[0]->uuid,
                'userImage' => $chatRoom->getFirstMediaUrl('profile', 'avatar') //vidjeti kako dobiti url za sliku
            ];
        }
        dump($this->users);

        // dump($authChatIds);
        dump(DB::getQueryLog());
    }

    public function render()
    {
        return view('livewire.chat')
            ->extends('layouts.main');
    }

}
