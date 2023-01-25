<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // try {
            // DB::enableQueryLog();
            // $users = User::where('is_public', 1)->get();
            $posts = Post::latest()
            ->with('media')
            ->with('comments')
            ->with('likers')
            ->paginate(6);
            // $posts = auth()->user()->posts()->get();
            // $posts = Post::paginate(6);
            // dump([$users, $posts]);
            // dump(DB::getQueryLog());
        // } catch (\Throwable $th) {
        //     throw $th;
        // }


        return view('index', compact('posts'));
    }
}
