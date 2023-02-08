<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function store(CommentRequest $request)
    // {
    //     Comment::create($request->getData());
    //     // dump($request->getData());
    //     // dump(request()->query('post'));
    //     return back();
    // }
}
