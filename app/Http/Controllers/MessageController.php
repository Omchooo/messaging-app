<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users = Auth::user()->chattedWith()->get();

        $onlineUsers = User::where('id', '!=', Auth::id())
            ->where('is_online', true)
            ->get();

        return view('messages.index', compact('users', 'onlineUsers'));
    }

    public function chat(User $user)
    {
        $messages = $this->getMessages($user->id);

        return view('messages.chat', compact('user', 'messages'));
    }

    public function getMessages($userId)
    {
        return Message::where(function ($query) use ($userId) {
                $query->where('from_user_id', Auth::id())
                      ->where('to_user_id', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('from_user_id', $userId)
                      ->where('to_user_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->reverse();
    }

    public function sendMessage(User $user, Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $message = Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $user->id,
            'body' => $request->body
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

    public function chattedWith()
    {
        $messages = Message::where('from_user_id', auth()->id())
                ->orWhere('to_user_id', auth()->id())
                ->orderByDesc('created_at')
                ->get();

        $users = collect([]);

        foreach ($messages as $message) {
            $otherUser = $message->fromUser->id === auth()->id() ? $message->toUser : $message->fromUser;

            if (!$users->contains('id', $otherUser->id)) {
                $users->push($otherUser);
            }
        }

        return $users;
    }
}
