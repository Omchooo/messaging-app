<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

    @auth
        <script>
            // document.addEventListener('DOMContentLoaded', function() {
            // var htmlElement = document.querySelector("html");
            document.querySelector("html").setAttribute("data-theme", localStorage.getItem("theme"));
            // });
        </script>
    @endauth

    @livewireStyles

    @stack('styles')



    <title>@yield('title')</title>

</head>

<body>
    <div class="h-screen flex flex-col justify-between">
        <div class="flex flex-col items-center relative">
            <div class="container mx-auto max-w-5xl my-5">
                <div class="navbar bg-base-200 shadow-xl rounded-box border border-gray-600">
                    @auth
                        @if (request()->is('profile'))
                            <label for="my-drawer-2" class="btn btn-outline btn-sm drawer-button lg:hidden">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current md:h-6 md:w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </label>
                        @else
                            <div class="flex-none">
                                <div class="indicator">
                                    {{-- <span class="indicator-item badge w-[7rem] badge-secondary">Coming Soon</span> --}}
                                    <a href="{{ route('inbox.index') }}" class="btn btn-outline btn-sm">inbox</a>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <div class="flex-1 justify-center">
                        <a href="{{ route('home') }}" class="btn  btn-outline normal-case text-xl">
                            InstaByte
                            {{-- <img src="{{ asset('storage/instabyte_logo2.png') }}" alt="logo" srcset=""> --}}
                        </a>
                    </div>
                    @auth
                        <div class="flex-none">
                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-12 rounded-full">
                                        @if (auth()->user()->getFirstMedia('profile')->img('avatar'))
                                        {{ auth()->user()->getFirstMedia('profile')->img('avatar') }}
                                        @else
                                            <img src="https://placeimg.com/192/192/people" />
                                        @endif
                                    </div>
                                </label>
                                <ul tabindex="0"
                                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-200 rounded-box w-52">
                                    <li>
                                        <a href="{{ route('viewprofile.index', auth()->user()) }}" class="justify-between">
                                            Profile
                                        </a>
                                    </li>
                                    <li><a href="{{ route('profile.edit') }}">Settings</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                            @csrf
                                            <button type="submit" class="w-full text-left">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

            {{-- content --}}
            @yield('content')

            <x-scroll-up />

            @unless (request()->is('inbox', 'inbox/*'))
                @auth
                    <livewire:message-notification-box wire:key="msgnotification.uniqid()">
                    @endauth
                @endunless

        </div>


        <footer class="footer items-center p-4 bg-base-100 text-neutral-content ">
            <div class="items-center grid-flow-col">
                <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    fill-rule="evenodd" clip-rule="evenodd" class="fill-info">
                    <path
                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                    </path>
                </svg>
                <p class="text-info">Made by: Omer Šahmanović</p>
            </div>
            <div class="grid-flow-col gap-2 md:place-self-center md:justify-self-end">
                <a href="https://www.linkedin.com/in/omer-sahmanovic-2a9a37225/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                        class="fill-info">
                        <g transform="translate(0.000000,30.000000) scale(0.004724,-0.005556)" class="fill-info">
                            <path
                                d="M283 5386 c-136 -43 -247 -167 -273 -307 -14 -70 -14 -4647 0 -4718 23 -121 113 -235 227 -289 l58 -27 2390 0 2390 0 58 27 c114 54 204 168 227 289 14 72 14 4648 0 4720 -23 120 -113 233 -227 287 l-58 27 -2375 2 c-1944 1 -2383 -1 -2417 -11z m1109 -778 c94 -47 176 -130 221 -225 30 -64 32 -74 32 -184 0 -113 -1 -116 -38 -191 -202 -410 -791 -317 -857 135 -24 165 69 357 216 443 90 53 139 65 250 62 93 -3 107 -6 176 -40z m2384 -1169 c446 -49 681 -286 759 -764 27 -162 35 -472 28 -1162 l-6 -673 -388 0 -388 0 -3 768 c-4 750 -4 769 -25 844 -42 147 -101 226 -206 274 -57 27 -71 29 -182 29 -139 0 -205 -16 -281 -68 -91 -62 -143 -153 -181 -312 -14 -61 -17 -165 -20 -802 l-4 -733 -390 0 -389 0 0 1270 0 1270 375 0 375 0 0 -170 c0 -181 7 -202 43 -141 36 61 110 142 180 197 197 154 409 206 703 173z m-2186 -1329 l0 -1270 -390 0 -390 0 0 1270 0 1270 390 0 390 0 0 -1270z" />
                            <path
                                d="M5863 726 c-65 -21 -128 -62 -167 -107 -146 -171 -115 -429 67 -553 271 -183 628 44 576 366 -20 124 -95 223 -209 276 -67 31 -199 40 -267 18z m205 -51 c69 -21 147 -86 186 -155 28 -50 31 -63 31 -145 0 -75 -4 -98 -24 -139 -76 -155 -261 -224 -413 -154 -197 91 -251 339 -109 501 82 93 207 128 329 92z" />
                            <path
                                d="M5840 370 l0 -200 30 0 30 0 0 85 0 85 33 0 c29 0 36 -7 85 -85 51 -81 55 -85 89 -85 43 0 42 3 -27 105 -48 71 -49 75 -27 75 13 0 35 13 50 28 22 22 27 38 27 76 0 95 -33 116 -185 116 l-105 0 0 -200z m211 121 c24 -30 24 -46 -1 -71 -16 -16 -33 -20 -85 -20 l-65 0 0 61 0 61 66 -4 c55 -3 70 -8 85 -27z" />
                        </g>
                    </svg>
                </a>
                <a href="https://github.com/Omchooo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                        class="fill-info">
                        <g transform="translate(0.000000,30.000000) scale(0.012500,-0.012500)" class="fill-info">
                            <path
                                d="M1040 2319 c-153 -20 -357 -99 -491 -190 -77 -52 -207 -175 -264 -249 -106 -139 -191 -329 -220 -497 -20 -112 -19 -318 1 -423 71 -375 324 -690 680 -845 89 -39 133 -44 157 -17 14 15 17 41 17 141 0 119 -1 122 -20 116 -38 -12 -174 -9 -221 4 -69 19 -114 62 -155 146 -36 74 -83 132 -138 171 -37 25 -28 44 21 44 51 0 99 -26 141 -77 125 -151 156 -169 267 -161 82 7 107 23 122 80 7 25 24 59 38 76 l26 31 -38 6 c-284 49 -416 157 -469 382 -41 177 -10 361 79 460 17 20 18 27 8 67 -16 63 -14 140 6 209 l16 59 46 -7 c57 -9 147 -44 213 -85 l51 -32 86 18 c111 22 289 22 406 0 l90 -17 60 35 c75 45 159 77 209 79 39 2 40 1 54 -43 16 -52 19 -193 5 -230 -8 -20 -5 -32 24 -72 55 -76 75 -140 80 -253 8 -176 -34 -311 -128 -410 -79 -83 -175 -126 -366 -161 -22 -4 -22 -5 10 -56 l32 -51 5 -227 c6 -250 8 -260 65 -260 55 0 200 68 325 153 60 41 192 168 245 237 106 138 191 329 220 497 20 112 19 318 -1 423 -31 165 -106 338 -205 471 -60 81 -195 212 -274 266 -235 159 -531 229 -815 192z" />
                        </g>
                    </svg>
                </a>

            </div>
        </footer>
    </div>
    {{-- <script src="{{ asset('resources\js\app.js') }}"></script> --}}
    @stack('scripts')
    @livewireScripts
</body>

</html>
