<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OnlineChatUsers extends Component
{
    public $users;
    public $user;

    public function render()
    {
        return view('livewire.online-chat-users');
    }

    /* napraviti da pri ucitavanju stranice ucita sve usere, svaki div usera ce kod slike imati id usera
        prilikom ucitavanja sa .here i .joining preko to id-a se dodaje active tacka kod slike, prilikom leaving
        brise se active tacka */

    public function getListeners()
    {
        return [
            "echo-presence:chat,here" => 'currentOnlineUsers',
            "echo-presence:chat,joining" => 'joiningOnlineUsers',
            "echo-presence:chat,leaving" => 'leavingOnlineUsers',
        ];
    }

    public function currentOnlineUsers($event)
    {
        // $this->users = [
        //     'username' => $event['name'],
        //     'id' => $event['id'],
        //      'status' => 1, //online
        // ];
        $this->users = $event;

        // dump($event);
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
