@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-5xl my-5 flex items-center justify-around">
        <div class="card w-96 bg-base-200 shadow-2xl my-4 border border-gray-600">
            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mx-3 items-center">
                    {{-- full name
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Full Name</span>
                        </label>
                        <input type="text" placeholder="Type here" name="full_name" id="full_name"
                            class="input input-md input-bordered w-full max-w-xs" />
                    </div> --}}
                    {{-- email --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" value="{{ old('email') }}"
                            class="input input-bordered w-full max-w-xs bg-base-100" required autocomplete="email" autofocus/>
                    </div>
                    {{-- password --}}
                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full max-w-xs bg-base-100" required autocomplete="password"/>
                    </div>
                    {{-- <textarea class="textarea textarea-bordered" id="desc" name="desc" placeholder="Description">{{ old('desc') }}</textarea> --}}
                </div>
                <div class="block mt-4 ml-9">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded bg-base-100 border-gray-300 dark:border-gray-700  shadow-sm focus:ring-accent-500 dark:focus:ring-accent-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                </div>
                <div class="divider my-0"></div>
                <div class="mx-9 mt-2 mb-3">
                    <button type="submit" class="btn btn-outline btn-sm btn-accent h-9 w-full ">Login</button>
                </div>
            </form>
        </div>

        <div class="mockup-code">
            <pre data-prefix="$"><code>php artisan serve</code></pre>
            <pre data-prefix=">" class="text-warning"><code>starting the server</code></pre>
            <pre data-prefix=">" class="text-warning"><code>loading web page</code></pre>
            <pre data-prefix=">" class="text-success"><code>successfully loaded, please login</code></pre>
            <x-input-error :messages="$errors" />
            <br/>
            <pre data-prefix=">" class="text-info"><code><a href="{{ url('/register') }}">don't have an account?</a></code></pre>
        </div>
    </div>
@endsection
