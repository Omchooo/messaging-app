<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tabs extends Component
{
    public $user;
    public $state = 0;

    public function updateState($updatedState)
    {
        $this->state = $updatedState;
        $this->emit('newState', $updatedState);
        // $this->emit('setAmount', 6);
    }

    public function render()
    {
        return view('livewire.tabs');
    }
}
