<?php

namespace App\Http\Livewire;

use App\Enums\NotificationType;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddComment extends Component
{
    public $comment;
    // private $post;
    public $authUser;
    public $post_id;
    public $post_auth;

    protected $rules = [
        'comment' => 'required|min:1'
    ];

    public function mount($post)
    {
        $this->post_id = $post->id;
        $this->post_auth = $post->user->id;
        $this->authUser = Auth::user()->id;
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
        $this->validate();

        Comment::create([
            'comment' => $this->comment,
            'user_id' => $this->post_auth,
            'post_id' => $this->post_id,
        ]);

        if ($this->authUser != $this->post_auth) {

            Notification::create([
                'from_user' => $this->authUser,
                'to_user' => $this->post_auth,
                'type' => NotificationType::Comment,
                'post_id' => $this->post_id,
            ]);
        }

        $this->comment = '';
    }
}
