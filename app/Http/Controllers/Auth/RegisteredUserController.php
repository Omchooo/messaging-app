<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
        // return view('test.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:25', 'unique:' . User::class],
            'full_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profilePictures = ['pfp-1', 'pfp-2', 'pfp-3', 'pfp-4', 'pfp-5'];
        $randomPicture = $profilePictures[array_rand($profilePictures)];
        $defaultPicturePath = storage_path('app/public/default-profile/' . $randomPicture . '.png');
        $tempPicturePath = tempnam(sys_get_temp_dir(), 'profile_picture_');
        File::copy($defaultPicturePath, $tempPicturePath);

        $user->addMedia($tempPicturePath)
            ->usingName('profile_picture')
            ->usingFileName($randomPicture . '.png')
            ->toMediaCollection('profile');

        // dump(storage_path('storage/default-profile/pfp-' . rand(1,5) . '.png'));
        // $wow = url('storage/default-profile/pfp-' . rand(1,5) . '.png');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
