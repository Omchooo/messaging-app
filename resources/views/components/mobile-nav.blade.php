<div class="btm-nav z-50 h-16 md:hidden">

    {{-- @if (request()->is('profile'))
        <label for="my-drawer-2" class="btn btn-outline btn-sm drawer-button lg:hidden">
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current md:h-6 md:w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </label>
    @else
                
    @endif --}}

    <button class="{{ request()->is('/') ? 'active' : '' }}">
        <div class="indicator gap-4">
            <div class="lg:tooltip lg:tooltip-bottom" data-tip="Home">
                <a href="{{ route('home') }}"
                    class="btn btn-circle btn-outline border-none hover:bg-base-200">
                    <svg aria-label="Home"
                        class="{{ request()->is('/') ? 'fill-base-content stroke-base-content' : 'fill-gray-400 stroke-gray-400' }}"
                        height="20" role="img" viewBox="0 0 24 24" width="20">
                        <path
                            d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
                            fill="{{ request()->is('/') ? 'fill-base-content' : 'none' }}"
                            stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </a>
            </div>
    </button>

    <button class="{{ request()->is('search') ? 'active' : '' }}">
        <div class="lg:tooltip lg:tooltip-bottom " data-tip="Search">
            <a href="{{ route('user.search') }}" class="btn btn-circle btn-outline border-none hover:bg-base-200">
                <svg aria-label="Search"
                    class="{{ request()->is('search') ? 'stroke-base-content' : 'stroke-gray-400' }}"
                    color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="20" role="img"
                    viewBox="0 0 24 24" width="20">
                    <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    </path>
                    <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        x1="16.511" x2="22" y1="16.511" y2="22"></line>
                </svg>
            </a>
        </div>
    </button>

    <button class="{{ Route::is('posts.create') ? 'active' : '' }}">
        <div class="lg:tooltip lg:tooltip-bottom " data-tip="Add Post">
            <a href="{{ route('posts.create') }}"
                class="btn btn-circle btn-outline border-none hover:bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 512.000000 512.000000">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                        fill="url(#grad2)" stroke="none" class="gradient-fill">
                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="75%" x2="100%"
                                y2="0%">
                                <stop offset="0%" style="stop-color:#5aecff;stop-opacity:1" />
                                <stop offset="50%" style="stop-color:#2ebeff;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#228dff;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path
                            d="M595 5103 c-290 -62 -519 -294 -579 -585 -14 -69 -16 -283 -16 -1958 0 -2057 -3 -1953 57 -2095 75 -178 230 -333 409 -408 141 -60 38 -57 2094 -57 2033 0 1947 -2 2084 51 172 68 333 223 412 398 63 140 58 -25 62 2076 2 1718 1 1918 -13 1989 -60 297 -291 529 -587 590 -69 14 -276 16 -1965 15 -1637 -1 -1897 -3 -1958 -16z m3867 -294 c171 -36 310 -175 347 -347 16 -75 16 -3728 0 -3804 -16 -74 -62 -162 -115 -218 -52 -55 -155 -113 -232 -129 -76 -16 -3730 -16 -3804 0 -172 37 -310 175 -347 347 -16 75 -16 3728 0 3804 18 87 58 158 123 223 64 64 127 100 211 121 68 17 3736 20 3817 3z" />
                        <path
                            d="M2410 3160 l0 -450 -450 0 -450 0 0 -150 0 -150 450 0 450 0 0 -450 0 -450 150 0 150 0 0 450 0 450 450 0 450 0 0 150 0 150 -450 0 -450 0 0 450 0 450 -150 0 -150 0 0 -450z" />
                    </g>
                </svg>
            </a>
        </div>
    </button>

    <button class="{{ request()->is('notifications') ? 'active' : '' }}">
        <div class="lg:tooltip lg:tooltip-bottom " data-tip="Notifications">
            <a href="#" class="btn btn-circle btn-outline border-none hover:bg-base-200">
                <svg class="{{ request()->is('notifications') ? '1' : 'stroke-gray-400 fill-gray-400' }}"
                    height="20px" width="20px" viewBox="0 0 24 24">
                    <path
                        d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"
                        stroke-width="0">
                    </path>
                </svg>
            </a>
        </div>
    </button>

    <button class="{{ request()->is('inbox') || request()->is('inbox/*') ? 'active' : '' }}">
        <div class="lg:tooltip lg:tooltip-bottom " data-tip="Inbox">
            <a href="{{ route('inbox.index') }}"
                class="btn btn-circle btn-outline border-none hover:bg-base-200">
                <svg class="{{ request()->is('inbox') || request()->is('inbox/*') ? 'fill-base-content stroke-base-content' : 'fill-gray-400 stroke-gray-400' }}"
                    height="20" viewBox="0 0 1792 1792" width="20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z" />
                </svg>
            </a>
        </div>
</div>