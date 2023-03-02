<?php

namespace App\Http\Controllers;

use App\Events\GreetingSent;
use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        return view('inbox.index');
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

    public function greetReceived(Request $request, User $user)
    {
        broadcast(new GreetingSent($user, "{$request->user()->username} greeted you"));
        broadcast(new GreetingSent($request->user(), "you greeted {$user->username}"));

        return "Greeting {$user->username} from {$request->user()->username}";
    }
}
