<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>

</head>

<body>
    <div class="container mx-auto max-w-5xl my-5">
        <div class="navbar bg-base-200 shadow-xl rounded-box border border-gray-600">
            <div class="flex-none">
                <div class="indicator">
                    <span class="indicator-item badge badge-secondary">99+</span>
                    <a href="{{ route('inbox.index') }}" class="btn btn-outline btn-sm">inbox</a>
                </div>
            </div>
            <div class="flex-1 justify-center">
                <a href="{{ route('home') }}" class="btn btn-ghost normal-case text-xl">InstaByte</a>
            </div>
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-12 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-200 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a href="{{ route('profile.edit') }}">Settings</a></li>
                        <li><a >Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- content --}}

    @yield('content')



</body>

</html>

