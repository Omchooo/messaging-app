<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{id}', function ($user, $id) {
    if ($user) {
        $chatRoom = Chat::where('id', $id)
            ->with('users')
            ->get()
            ->toArray();
        // dump($chatRoom[0]['users']);
        $usrs = $chatRoom[0]['users'];
        foreach ($usrs as $usr) {
            // dump($usr);
            // dump(in_array(auth()->user()->id, $usr));
            return in_array(auth()->user()->id, $usr);
        }


        // $chatRoom = ModelsChat::where('uuid', $uuid)
        //     ->with('users')
        //     ->get()
        // ->toArray();
        // // dump($chatRoom[0]['users']);
        // $usrs = $chatRoom[0]['users'];
        // foreach ($usrs as $usr) {
        //     // dump($usr);
        //     dump(in_array(auth()->user()->id, $usr));
        // }

        // $userIds = User::whereHas('chats', function ($query) use ($uuid) {
        //     $query->where('uuid', $uuid);
        // })
        //     ->where('id', '<>', auth()->user()->id)
        //     ->get()
        //     ->toArray();
        // foreach ($userIds as $userId) {
        //     dump($userIds);
        //     dump(in_array(auth()->user()->id, $userId));
        // }

        // $userIds = Chat::where('uuid', $uuid)
        //     ->pluck('user_id')
        //     ->toArray();
        // return in_array($user->id, $userIds);
    }
});

Broadcast::channel('inbox.greet.{receiver}', function ($user, $receiver) {
    return (int) $user->id === (int) $receiver;
});
