<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    protected $profileUser;

    public function index(User $user)
    {
        $title = ($user->full_name ?? $user->username) .  " • InstaByte";
        // $user->load(['following', 'followers']);
        // dd($user->following->toArray());

        // DB::enableQueryLog();
        // $posts = Post::latest()->where('user_id', $user->id)->take(6)->get();
        // dump(DB::getQueryLog());
        // dump($posts);
        return view('viewprofile.index', compact('user', 'title'));
    }



    // -===  trash  ===-//

    // $chat = Chat::whereHas('users', function ($query) use ($user1, $user2) {
    // $query->whereIn('user_id', [$user1->id, $user2->id])
    // ->where('user_id', $user2->id)
    //   ->groupBy('chats.id', 'chats.created_at', 'chats.updated_at');
    //   ->havingRaw('COUNT(DISTINCT user_id) = 2');
    // $query->whereIn('user_id', [$user1->id, $user2->id])->groupBy('chat_id')->havingRaw('COUNT(DISTINCT user_id) = 2');
    // $query->whereIn('user_id', [$user1->id, $user2->id])->groupBy('chat_id')->havingRaw('COUNT(DISTINCT user_id) = 2');
    // })->first();

    // if (!$chat) {
    //     $chat = Chat::create([
    //         'user_id' => auth()->id(),
    //         'uuid' => uuid_create()]);
    //     $chat->users()->attach([$user1->id, $user2->id]);
    // }
}
