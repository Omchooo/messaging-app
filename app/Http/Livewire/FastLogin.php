<?php

namespace App\Http\Livewire;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class FastLogin extends Component
{
    public function fastLogin()
    {
        $credentials = [
            'email' => 'test@test.com',
            'password' => 'testtest',
        ];

        $request = new LoginRequest($credentials);
        $request->authenticate();

        session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function render()
    {
        return view('livewire.fast-login');
    }
}
