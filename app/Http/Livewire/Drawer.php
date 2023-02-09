<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Drawer extends Component
{
    public $user;
    public $toggleTab = 3;

    public function render()
    {
        return view('livewire.drawer');
    }

    public function changeTab($value)
    {
        $this->toggleTab = $value;
        // if ($value == 1) {
        //     $this->editprofile = 1;
        //     $this->mngfollowers = $this->mngaccount = $this->bugreport = 0;

        // } elseif ($value == 2) {
        //     $this->mngfollowers = 1;
        //     $this->editprofile = $this->mngaccount = $this->bugreport = 0;

        // } elseif ($value == 3) {
        //     $this->mngaccount == 1;
        //     $this->editprofile = $this->mngfollowers = $this->bugreport = 0;

        // } elseif ($value == 4) {
        //     $this->bugreport == 1;
        //     $this->editprofile = $this->mngaccount = $this->mngfollowers = 0;
        // }

    }
}
