<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $likeColor;
    public $post;
    public $comment;
    public $type;
    // public

    public function getType()
    {
        if ($this->post) {
            $this->type = $this->post;
        }
        else {
            $this->type = $this->comment;
        }
    }

    public function getColor()
    {
        $this->getType();
        if (Auth::user()->hasLiked($this->type)) {
            return '#ed4956';
        }
        else {
            return '#8e8e8e';
        }
    }

    public function setLike()
    {
        $this->getType();
        // $this->getColor();
        // return Auth::user()->toggleLike($this->type);
        return Auth::user()->toggleLike($this->type);
    }

    public function getLikes()
    {
        $this->getType();
        // $likesCount = $this->type->likers_count;
        // dump($this->type);
        // dump($likesCount);
        // return $this->type->fresh()->likers()->count();
        return $this->type->fresh()->likers()->count();
    }

    public function render()
    {
        $this->getType();
        $color = $this->getColor();
        $likes = $this->getLikes();

        return view('livewire.likes', compact('color', 'likes'));
    }
}
