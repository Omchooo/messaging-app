<?php

namespace App\Http\Livewire;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddComment extends Component
{
    public $comment;
    public $post_id;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }
    public function render()
    {
        return view('livewire.add-comment');
    }


    public function postComment()
    {
        // $validatedData = Validator::make([
        //     'comment' => $this->comment,
        //     'user_id' => auth()->id(),
        //     'post_id' => $this->post_id,
        // ], [
        //     'comment' => 'required|string|min:1|max:255',
        //     'user_id' => 'required|numeric',
        //     'post_id' => 'required|numeric',
        // ]);

        // if ($validatedData->fails()) {
        //     $this->emit('commentValidationFailed', $validatedData->errors());
        //     return;
        // }

        Comment::create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
            'post_id' => $this->post_id,
    ]);

        $this->comment = '';
    }
}

