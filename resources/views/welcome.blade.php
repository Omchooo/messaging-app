<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>

</head>

<body>
    <div class="container mx-auto max-w-5xl my-5">
        <div class="navbar bg-base-100">
            <div class="flex-none">
                <div class="indicator">
                    <span class="indicator-item badge badge-secondary">99+</span>
                    <button class="btn btn-outline">inbox</button>
                </div>
            </div>
            <div class="flex-1 justify-center">
                <a class="btn btn-ghost normal-case text-xl">InstaByte</a>
            </div>
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-12 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    {{-- content --}}

    <div class="container mx-auto max-w-7xl my-5 flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="avatar items-center">
                <div class="w-10 rounded-full mx-3">
                    <img src="https://placeimg.com/192/192/people" />
                </div>
                <span>username</span>
            </div>
            <figure class="pt-2">
                <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="rounded-xl aspect-9/16" />
            </figure>
            <div class="flex flex-col mx-3">
                <div class="flex my-2">
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" viewBox="0 0 24 24" fill="#8e8e8e" color="#8e8e8e">
                            <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                        </svg>
                    </div>
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
                <span>2,179 likes</span>
                <span><a href="">view all 494 comments</a></span>
                <span class="text-xs">6 hours ago</span>
            </div>
            <div class="divider my-1"></div>
            <div class="flex items-center justify-between px-3 my-2 gap-1">
                <input type="text" placeholder="Add a comment..." class="input input-ghost w-full max-w-xs" />
                <div class="btn btn-circle btn-sm btn-link">
                    <svg aria-label="Share Post" class="_ab6-" color="#8e8e8e" fill="#8e8e8e" height="24" role="img" viewBox="0 0 24 24" width="24">
                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line>
                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
