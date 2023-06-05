<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HasChat extends Component
{
    public $user1, $user2;
    public $isOwner = 0;

    public function mount(User $user)
    {
        // dump($user->id);
        // dump(Auth::user()->id);
        $this->user1 = Auth::user();
        $this->user2 = $user;
        // dump($this->user1->id);
        // dump($this->user2->id);

        if ($this->user1->id === $this->user2->id) {
            $this->isOwner = 1;
        }
    }

    public function render()
    {
        return view('livewire.has-chat', [
            'isOwner' => $this->isOwner,
            'user' => $this->user2,
        ]);
    }

    public function chatRoom()
    {
        // $this->usr = $this->user1;
        // dump($this->usr);
        // $user2 = Auth::user();
        // $this->test($this->user1, $this->user2);
    //    $this->getOrCreateChatRoom($this->user1, $this->user2);
    }


    function getOrCreateChatRoom()
    {
        $authUser = $this->user1;
        $otherUser = $this->user2;

        $chat = Chat::whereHas('users', function ($query) use ($authUser) {
            $query->where('user_id', $authUser->id);
        })->whereHas('users', function ($query) use ($otherUser) {
            $query->where('user_id', $otherUser->id);
        })->first();

        // dd($chat);
        if ($chat) {
            // Chat already exists, return the chat code
            $chatCode = $chat->uuid;
        } else {
            // Chat doesn't exist, create a new one
            $chatCode = uuid_create();
            $chat = new Chat;
            $chat->uuid = $chatCode;
            $chat->save();

            // Attach the two users to the chat
            $chat->users()->attach([$authUser->id, $otherUser->id]);
        }

        // Return the chat code
        return redirect()->to(route('inbox.chat', $chatCode));
        // return $chatCode;
        // dd($chatCode);





        // // DB::enableQueryLog();
        // $chat = DB::table('chats')
        //     ->whereIn('user_id', [$this->user2->id, $this->user1->id])
        //     // ->groupBy(['id', 'uuid'])
        //     ->get();

        // // If a chat room already exists, get the ID
        // if (!$chat->isEmpty()) {
        //     foreach ($chat as $c) {
        //         $participants = DB::table('chats')
        //             ->where('uuid', $c->uuid)
        //             ->pluck('user_id')
        //             ->toArray();

        //         if (in_array($this->user2->id, $participants) && in_array($this->user1->id, $participants)) {
        //             $chat_id = $c->uuid;
        //             break;
        //         }
        //     }
        // }

        // // If a chat room doesn't exist, create a new one
        // if (!isset($chat_id)) {
        //     $uuid = uuid_create();
        //     $chat = DB::table('chats')->insert([
        //         ['uuid' => $uuid, 'user_id' => $this->user2->id, 'created_at' => now(), 'updated_at' => now()],
        //         ['uuid' => $uuid, 'user_id' => $this->user1->id, 'created_at' => now(), 'updated_at' => now()],
        //     ]);

        //     // Get the ID of the newly created chat room
        //     $chat_id = DB::table('chats')
        //         ->whereIn('user_id', [$this->user2->id, $this->user1->id])
        //         ->groupBy('uuid')
        //         ->pluck('uuid');

        //     $chat_id = $chat_id[0];
        // }
        // // dump(DB::getQueryLog());

        // return redirect()->to(route('inbox.chat', $chat_id));
    }

}
