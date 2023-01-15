<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // $post = Post::create($request->getData());
        // $post->addMediaFromRequest('image')->toMediaCollection();
        // $post = $request->getData();
        dump($request->getData());
    }
}
