<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $searchInput;
    public $users = [];
    protected $searchOutput;

    public function render()
    {
        if ($this->searchInput) {
            $searchInput = $this->searchInput;
            $this->searchOutput = User::where(function ($query) use ($searchInput) {
                $query->where('username', 'LIKE', "%{$searchInput}%")
                    ->orWhere('full_name', 'LIKE', "%{$searchInput}%");
            })
                // where('username', 'LIKE', "%{$this->searchInput}%")
                // ->where('full_name', 'LIKE', "%{$this->searchInput}%")
                ->where('id', '!=', auth()->user()->id)
                ->with(['media'])
                ->get();
        }

        if ($this->searchOutput) {
            $this->users = [];
            foreach ($this->searchOutput as $user) {
                $this->users[] = [
                    'username' => $user->username,
                    'fullName' => $user->full_name,
                    'userImage' => $user->getFirstMediaUrl('profile', 'avatar'),
                    'desc' => $user->bio,
                ];
                // dump($user->getFirstMediaUrl('profile', 'avatar'));
                // dump($user->username);
            }
        }

        return view('livewire.user-search')
            ->extends('layouts.main');;
    }
}
