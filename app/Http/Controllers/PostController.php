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
        Post::create($request->getData())
            ->addMediaFromRequest('image')
            ->withResponsiveImages()
            ->toMediaCollection('post');
        // $post = $request->getData();
        // dump($request->getData());
        return redirect()->route('posts.create')->with('message', 'Post has been successfully published');
    }

    public function show(Post $post)
    {
        $title = 'Post by ' . ($post->user->full_name ?? $post->user->username) . ' • InstaByte';
        // dump($post->comments);
        // $comments = $post->comments;

        // $comments = Comment::latest()
        // ->where('post_id', $post->id)
        // // ->with('likers')
        // ->paginate(6);

        // $post->fresh();
        // dump(request()->route('post'));
        return view('posts.show', compact('post', 'title'));
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validatedData = $request->validate([
            'desc' => 'nullable|string|max:255',
        ]);

        $post->desc = $validatedData['desc'];
        $post->save();

        return redirect()->back()->with('message', 'Post has been updated successfully');
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->to(route('viewprofile.index', auth()->user()->username));
    }

    public function restore(Post $post)
    {
        $this->authorize('restore', $post);

        $post->restore();

        return redirect()->back();
    }

    public function forceDelete(Post $post)
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        return redirect()->back();
    }
}
