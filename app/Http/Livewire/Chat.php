<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $users;
    public $otherChatUser;
    public $uuid;
    // private $chatid;

    public function mount()
    {
        // dump($this->uuid);
        $authUser = auth()->user();
        $authUserChats = $authUser->chats;
        $authUserChatIds = [];
        // dd($authUser->chats());
        // dd($authUserChatIds);
        foreach ($authUserChats as $authUserChat) {
            $authUserChatIds[] = $authUserChat->uuid;
            // dump($authUserChat->uuid);
        }
        // dump($authUserChatIds);

        // DB::enableQueryLog();

        if (!in_array($this->uuid, $authUserChatIds)) {
            abort(403, 'You don\'t have permission to this chat room.');
        } else {
            $allChatRooms = User::whereHas('chats', function ($query) use ($authUserChatIds) {
                $query->whereIn('uuid', $authUserChatIds);
                })
                ->with('chats', function ($query) use ($authUserChatIds) {
                    $query->whereIn('uuid', $authUserChatIds);
                })
                ->with(['media', 'messages'])
                ->where('id', '<>', auth()->user()->id)
                ->get();
            // dump($allChatRooms);

            foreach ($allChatRooms as $chatRoom) {
                // dump(['username' => $chatRoom->username, 'full name' => $chatRoom->full_name, 'chat uuid' => $chatRoom->chats[0]->uuid]);
                // dump($chatRoom->chats[0]->toArray());
                $this->users[] = [
                    'userName' => $chatRoom->username,
                    'fullName' => $chatRoom->full_name,
                    'chatUuid' => $chatRoom->chats[0]->uuid,
                    'userImage' => $chatRoom->getFirstMediaUrl('profile', 'avatar')
                ];

                if (in_array($this->uuid, $chatRoom->chats[0]->toArray())) {
                    $this->otherChatUser = [
                        'userName' => $chatRoom->username,
                        'fullName' => $chatRoom->full_name,
                        'chatId' => $chatRoom->chats[0]->id,
                        'chatUuid' => $chatRoom->chats[0]->uuid,
                        'userImage' => $chatRoom->getFirstMediaUrl('profile', 'avatar')
                    ];
                }
            }
            // dump($this->users);
            dump($this->otherChatUser);

            // dump(DB::getQueryLog());
        }
    }

    public function render()
    {
        return view('livewire.chat')
            ->extends('layouts.main');
    }
}
