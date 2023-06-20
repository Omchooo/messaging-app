<div class="w-full">
    <div class="flex flex-col items-center w-full">
        @if ($posts)
            @foreach ($posts as $post)
                @if ($post->user->is_public === 1)
                    <div class="card md:w-120 w-full max-w-xs md:max-w-none my-4 first:mt-0 rounded-none mb-10">
                        {{-- <div class="flex items-center justify-between my-2 mx-2">
                            <div class="avatar items-center">
                                <div class="w-10 rounded-full">
                                    @if ($post->user->getFirstMedia('profile')->img('avatar'))
                                        {{ $post->user->getFirstMedia('profile')->img('avatar') }}
                                    @else
                                        <img src="https://placeimg.com/192/192/people" />
                                    @endif
                                </div>
                                <span class="mx-2"><a
                                        href="{{ route('viewprofile.index', $post->user) }}">{{ $post->user->full_name ?? $post->user->username }}</a></span>
                            </div>
                            @if ($post->user->id === auth()->user()->id)
                                <div class="dropdown dropdown-end">
                                    <label tabindex="0" class="btn btn-info btn-xs btn-outline text-xs">manage</label>
                                    <ul tabindex="0"
                                        class="dropdown-content max-w-[9rem] flex flex-col gap-1 mr-2 p-2 shadow bg-base-200 rounded-box w-52">
                                        <li><a href="{{ route('posts.edit', compact('post')) }}"
                                                class="btn btn-sm btn-wide max-w-[8rem] btn-outline">Edit</a></li>
                                        <li>
                                            <form action="{{ route('posts.delete', compact('post')) }}" method="post">
                                                <button
                                                    class="btn btn-sm btn-wide max-w-[8rem] btn-error btn-outline">Delete</button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <livewire:follow :user="$post->user" :wire:key="uniqid()" />
                            @endif
                        </div> --}}
                        <picture class="flex justify-center bg-base-300 rounded home-img shadow">
                            {{ $post->getFirstMedia('post')->img('responsive') }}
                        </picture>

                        <div class="flex items-center justify-between py-3 ">
                            <div class="avatar items-center">
                                <div class="w-8 md:w-9 rounded-full">
                                    @if (auth()->user()->getFirstMediaUrl('profile', 'avatar'))
                                        {{-- {{ $post->user->getFirstMedia('profile')->img('avatar') }} --}}
                                        <img src="{{ $post->user->getFirstMediaUrl('profile', 'avatar') }}"
                                            alt="Profile photo">
                                    @else
                                        <img src="https://placeimg.com/192/192/people" />
                                    @endif
                                </div>
                                <span class="flex flex-col mx-2">
                                    <a
                                        href="{{ route('viewprofile.index', $post->user) }}">{{ $post->user->full_name ?? $post->user->username }}</a>
                                    <span class="text-xs text-start mr-2 text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                            <div class="flex items-center">
                                <livewire:likes :post="$post" :wire:key="time().$post->id" />
                                {{-- <span>{{ $post->likers_count }} likes</span> --}}
                                <livewire:modal :post="$post" :wire:key="uniqid().time()" />


                                <div class="dropdown dropdown-end">
                                    <label tabindex="0"
                                        class="btn btn-sm btn-circle btn-outline border-none hover:bg-transparent">
                                        <svg height="20" width="20" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 398.414 398.414"
                                            class="fill-gray-400 ml-1">
                                            <path
                                                d="M58.274,140.937C26.142,140.937,0,167.079,0,199.211c0,32.124,26.141,58.266,58.274,58.266 s58.274-26.141,58.274-58.266C116.548,167.079,90.406,140.937,58.274,140.937z M58.274,233.099 c-18.688,0-33.888-15.2-33.888-33.88c0-18.688,15.2-33.888,33.888-33.888s33.888,15.209,33.888,33.888 C92.162,217.891,76.961,233.099,58.274,233.099z">
                                            </path>
                                            <path
                                                d="M197.85,140.937c-32.132,0-58.274,26.141-58.274,58.274c0,32.124,26.141,58.266,58.274,58.266 s58.274-26.141,58.274-58.266C256.123,167.079,229.982,140.937,197.85,140.937z M197.85,233.099 c-18.688,0-33.888-15.2-33.888-33.88c0-18.688,15.2-33.888,33.888-33.888s33.888,15.209,33.888,33.888 C231.738,217.891,216.537,233.099,197.85,233.099z">
                                            </path>
                                            <path
                                                d="M340.14,140.937c-32.132,0-58.274,26.141-58.274,58.274c0,32.124,26.142,58.266,58.274,58.266 s58.274-26.141,58.274-58.266C398.414,167.079,372.272,140.937,340.14,140.937z M340.14,233.099 c-18.688,0-33.888-15.2-33.888-33.88c0-18.688,15.2-33.888,33.888-33.888s33.888,15.209,33.888,33.888 C374.028,217.891,358.828,233.099,340.14,233.099z">
                                            </path>
                                        </svg>
                                    </label>
                                    <ul tabindex="0"
                                        class="dropdown-content max-w-[9rem] flex flex-col gap-1 mr-2 p-2 shadow bg-base-100 rounded w-52">
                                        @if ($post->user->id === auth()->user()->id)
                                            <li>
                                                <a href="{{ route('posts.edit', compact('post')) }}"
                                                    class="btn btn-sm btn-wide max-w-[8rem] bg-transparent border-none hover:bg-base-300 text-current">Edit</a>
                                                {{-- <a href="{{ route('posts.edit', compact('post')) }}"
                                                    class="btn btn-sm btn-wide max-w-[8rem] btn-active">Edit</a> --}}
                                            </li>
                                            <li>
                                                <form action="{{ route('posts.delete', compact('post')) }}" method="post">
                                                    <button
                                                        class="btn btn-sm btn-wide max-w-[8rem] bg-transparent border-none hover:bg-base-300 text-red-700">Delete</button>
                                                    {{-- <button
                                                        class="btn btn-sm btn-wide max-w-[8rem] btn-error">Delete</button> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        @else
                                            <li class="flex justify-center">
                                                <livewire:follow :user="$post->user" :wire:key="uniqid()" />
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="divider my-1"></div> --}}
                        {{-- <livewire:add-comment :post_id="$post->id" :wire:key="uniqid()" /> --}}
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <x-loading />

</div>
