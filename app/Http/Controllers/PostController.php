<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->getData());
        $post->addMediaFromRequest('image')->toMediaCollection();
        // $post = $request->getData();
        // dump($request->getData());
        return redirect()->route('posts.create')->with('message', 'Post has been successfully published');
    }

    public function show(Post $post)
    {
        // dump($post->id);
        // $comments = $post->comments;
        $comments = Comment::latest()->where('post_id', $post->id)->paginate(6);
        $post->fresh();
        // dump(request()->route('post'));
        return view('posts.show', compact('post', 'comments'));
    }


}
