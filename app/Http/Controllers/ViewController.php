<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function index(User $user)
    {
        // DB::enableQueryLog();
        // $posts = Post::latest()->where('user_id', $user->id)->take(6)->get();
        // dump(DB::getQueryLog());
        // dump($posts);
        return view('viewprofile.index', compact('user'));
    }
}
