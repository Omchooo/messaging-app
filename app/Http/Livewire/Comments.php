<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    protected $allComments;

    public function mount($comments)
    {
        $this->allComments = $comments;
        // dd($this->allComments);
    }
    public function render()
    {
        // dd($this->allComments);
        $allComments = $this->allComments;
        return view('livewire.comments', compact('allComments'));
    }

}
