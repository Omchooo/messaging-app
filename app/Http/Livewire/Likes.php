<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $post;

    public function getLike()
    {
        return Auth::user()->toggleLike($this->post);
    }

    public function render()
    {
        return view('livewire.likes');
    }
}
