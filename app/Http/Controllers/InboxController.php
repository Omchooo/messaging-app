<?php

namespace App\Http\Controllers;

use App\Events\GreetingSent;
use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public $users;

    function formatTimeDifference(Carbon $dateTime)
    {
        $minutesDiff = $dateTime->diffInMinutes();

        if ($minutesDiff < 1) {
            $secondsDiff = $dateTime->diffInSeconds();
            return $secondsDiff . 's';
        } elseif ($minutesDiff < 60) {
            return $minutesDiff . 'm';
        } else {
            $hoursDiff = $dateTime->diffInHours();

            if ($hoursDiff < 24) {
                return $hoursDiff . 'h';
            } else {
                $daysDiff = $dateTime->diffInDays();
                return $daysDiff . 'd';
            }
        }
    }

    public function onLoad()
    {
        // dump(auth()->user()->chats->toArray());
        $authUserChats = auth()->user()->chats->toArray();
        $authChatIds = [];
        foreach ($authUserChats as $authUserChat) {
            $authChatIds[] = $authUserChat['uuid'];
        }
        // dump($authChatIds);


        $allChatRooms = User::whereHas('chats', function ($query) use ($authChatIds) {
            $query->whereIn('uuid', $authChatIds);
        })
            ->with('chats', function ($query) use ($authChatIds) {
                $query->whereIn('uuid', $authChatIds);
            })
            ->with('media')
            ->where('id', '<>', auth()->user()->id)
            ->get();
        // dump($allChatRooms);

        foreach ($allChatRooms as $chatRoom) {
            // dump(['username' => $chatRoom->username, 'full name' => $chatRoom->fullname, 'chat uuid' => $chatRoom->chats[0]->uuid]);
            $lastMessage = $chatRoom->chats[0]->messages()->latest('created_at')->first();
            $lastMessageSentAt = $lastMessage ? $this->formatTimeDifference($lastMessage->created_at) : null;

            $this->users[] = [
                'userName' => $chatRoom->username,
                'fullName' => $chatRoom->full_name,
                'chatUuid' => $chatRoom->chats[0]->uuid,
                'userImage' => $chatRoom->getFirstMedia('profile')->img('avatar'),
                'lastMessage' => $lastMessage ? $lastMessage->text : null,
                'lastMessageSentAt' => $lastMessageSentAt
            ];
        }
    }

    public function index()
    {
        $this->onLoad();

        $users = $this->users;

        // dump($users);

        return view('inbox.index', compact('users'));
    }

    // public function messageReceived(Request $request)
    // {
    //     $rules = [
    //         'message' => 'required',
    //     ];

    //     $request->validate($rules);

    //     broadcast(new MessageSent($request->user(), $request->message));

    //     return response()->json('Message Broadcasted');
    // }

    // public function greetReceived(Request $request, User $user)
    // {
    //     broadcast(new GreetingSent($user, "{$request->user()->username} greeted you"));
    //     broadcast(new GreetingSent($request->user(), "you greeted {$user->username}"));

    //     return "Greeting {$user->username} from {$request->user()->username}";
    // }
}
