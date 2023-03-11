<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OnlineChatUsers extends Component
{
    public $users;
    public $allUsers;

    public function render()
    {
        return view('livewire.online-chat-users');
    }

    /* napraviti da pri ucitavanju stranice ucita sve usere, svaki div usera ce kod slike imati id usera
        prilikom ucitavanja sa .here i .joining preko to id-a se dodaje active tacka kod slike, prilikom leaving
        brise se active tacka */

    public function getListeners()
    {
        // return [
        //     "echo-presence:chat,here" => 'currentOnlineUsers',
        //     "echo-presence:chat,joining" => 'joiningOnlineUsers',
        //     "echo-presence:chat,leaving" => 'leavingOnlineUsers',

        // ];
    }


    //-----------------------------stari kod ispod--------------------------------

    public function currentOnlineUsers($event)
    {
        // $this->users = [
        //     'username' => $event['name'],
        //     'id' => $event['id'],
        //      'status' => 1, //online
        // ];
        // $media = Media::where('model_id', $userId)
        //     ->where('model_type', Post::class)
        //     ->first();

        // $existingUsersId = array_column($event, 'id');
        // dump(array_values($existingUsersId));
        // $this->users = User::Where('id', $existingUsersId);

        $this->users = $event;

        // dump($event);
        // dump($this->users);
    }

    public function joiningOnlineUsers($event)
    {
        //moze se koristiti za autentikaciju usera, npr da li moze pristupiti chatu

        // dump($event);
        $existingUsersId = array_column($this->users, 'id');
        if (!in_array($event['id'], $existingUsersId)) {
            $this->users[] = $event;
            // dump($this->users[] = $event);
        }
        // dump($event);
    }

    public function leavingOnlineUsers($event)
    {
        // dump($event['id']);
        // dump($this->users);

        // $existingUsersId = array_column($this->users, 'id');
        // if (in_array($event['id'], $existingUsersId)) {
        // $this->users[] = $event;
        // dump($this->users[] = $event);
        // }
        $existingUsersId = array_column($this->users, 'id');
        $key = array_search($event['id'], $existingUsersId);
        // dump($key);
        if ($key !== false) {
            unset($this->users[$key]);
            // dump($this->users);
        }
        // dump($event);
    }
}
