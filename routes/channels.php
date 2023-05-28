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

        $allUserChats = $user->chats->pluck('id')->toArray();
        return in_array($id, $allUserChats);

        // // dump($authUser->chats->toArray());
        // $allUserChats = $authUser->chats->toArray();
        // foreach ($allUserChats as $userChats) {
        //     dump($userChats['uuid']);
        //     dump(in_array( $this->uuid, $userChats));
        // }

    }
});

Broadcast::channel('inbox.greet.{receiver}', function ($user, $receiver) {
    return (int) $user->id === (int) $receiver;
});
