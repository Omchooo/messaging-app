@extends('layouts.main')

@section('title', 'Register • InstaByte')

@section('content')
    <div class="container mx-auto max-w-5xl mb-5 flex items-center justify-around">
        <div class="mockup-code">
            <pre data-prefix="$"><code>create your own account</code></pre>
            <pre data-prefix=">" class="text-warning"><code>you can enter fake credentials</code></pre>
            <pre data-prefix=">" class="text-warning"><code>there are no email confirmations</code></pre>
            <x-input-error :messages="$errors" class="mt-2" />
            {{-- <x-input-error :messages="$errors->get('username')" class="mt-2" />
            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
            <br/>
            <pre data-prefix=">" class="text-info"><code><a href="{{ url('/login') }}">already have an account?</a></code></pre>
        </div>

        <div class="card w-96 bg-base-200 shadow-2xl my-4 border border-gray-600">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mx-3 items-center">
                    {{-- username --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="input input-bordered w-full max-w-xs bg-base-100" required autocomplete="username" autofocus/>
                    </div>
                    {{-- full name --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Full Name (optional)</span>
                        </label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}"
                            class="input input-bordered w-full max-w-xs bg-base-100" autocomplete="full_name"/>
                    </div>
                    {{-- email --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="input input-bordered w-full max-w-xs bg-base-100" required autocomplete="email"/>
                    </div>
                    {{-- password --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full max-w-xs bg-base-100" />
                    </div>
                    {{-- password --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Password Confirmation</span>
                        </label>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full max-w-xs bg-base-100" />
                    </div>
                    {{-- <textarea class="textarea textarea-bordered" id="desc" name="desc" placeholder="Description">{{ old('desc') }}</textarea> --}}
                </div>
                <div class="divider my-0"></div>
                <div class="mx-9 mt-2 mb-3">
                    <button type="submit" class="btn btn-outline btn-sm btn-accent h-9 w-full ">Register</button>
                </div>
            </form>
        </div>


    </div>
@endsection
