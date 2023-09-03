{{-- comments modal --}}
<div
    class="container max-w-6xl flex flex-col items-center {{ request()->is('post/*') ? 'h-max' : 'h-full' }} pb-16 md:pb-14">
    <div class="flex md:flex-row max-w-4xl card bg-base-100 rounded-none h-full w-full md:h-auto">
        <picture class="hidden md:flex items-center bg-base-300 md:max-w-[22rem] lg:max-w-md relative">
            {{ $post->getFirstMedia('post')->img('responsive') }}
            {{-- <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="" /> --}}
        </picture>
        <div class="divider divider-horizontal mx-0 max-w-[0.125rem] hidden md:flex"></div>
        <div class="lg:w-[34rem] max-w-xl flex flex-col h-full w-full md:h-auto">
            <div class="flex items-center justify-between py-2 px-2 bg-base-100">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        @if ($post->user->getFirstMedia('profile')->img('avatar'))
                            {{ $post->user->getFirstMedia('profile')->img('avatar') }}
                        @else
                            <img src="https://placeimg.com/192/192/people" />
                        @endif
                    </div>
                    <span class="mx-2 text-lg truncate"><a
                            href="{{ route('viewprofile.index', $post->user) }}">{{ $post->user->full_name ?? $post->user->username }}</a></span>
                </div>
                <div class="flex items-center">
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-sm btn-circle btn-outline border-none hover:bg-transparent">
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
                    <button
                            class="btn btn-square text-current text-xl bg-transparent border-none hover:bg-transparent {{ request()->is('post/*') ? 'hidden' : '' }}"
                            wire:click="$emitUp('toggleComponent')">X</button>
                </div>
            </div>
            <div class="divider my-0 max-h-[0.125rem]"></div>

            @if (request()->is('post/*'))
                <picture class="md:hidden bg-base-300 show-post-img">
                    {{ $post->getFirstMedia('post')->img('responsive') }}
                    {{-- <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="" /> --}}
                </picture>

                <div class="divider my-0 max-h-[0.125rem] md:hidden"></div>
            @endif


            {{-- <div class="divider my-0"></div> --}}

            <div class="flex flex-col relative h-full items-center my-1 min-h-[15rem] lg:min-h-[20rem]">
                <div
                    class="flex flex-col gap-6 min-h-[15rem] lg:min-h-[20rem] h-full w-[calc(100%-0.5rem)] overflow-y-auto absolute">
                    @isset($post->desc)
                        <div class="flex gap-2">
                            <div class="avatar items-start ml-1">
                                <div class="w-7 rounded-full ">
                                    @if ($post->user->getFirstMedia('profile')->img('avatar'))
                                        {{ $post->user->getFirstMedia('profile')->img('avatar') }}"
                                    @else
                                        <img src="https://placeimg.com/192/192/people" />
                                    @endif
                                </div>
                                {{-- {{ $post->user->getFirstMedia('profile')->img('avatar') }} --}}
                                {{-- <span class="break-all ml-2 max-w-md">{{ $post->desc }}</span> --}}
                            </div>
                            <span class="mx-2 max-w-lg break-words"><span
                                    class="font-semibold">{{ $post->user->username }}</span> {{ $post->desc }}</span>
                        </div>
                    @endisset
                    {{-- comment with replies --}}
                    @if ($hasComments)
                        <livewire:comments :post="$post" :wire:key="uniqid().time()">
                    @endif
                    {{-- load more comments --}}

                </div>
            </div>
            <div class="divider my-0"></div>

            <div class="flex flex-col mx-3">
                <div class="flex">
                    <livewire:likes :post="$post">
                        {{-- <div class="btn btn-circle btn-sm btn-link">
                                    <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                    </svg>
                                </div> --}}
                </div>
                <span class="text-xs my-1">{{ $post->created_at->diffForHumans() }}</span>
                <div class="divider my-0"></div>
                <livewire:add-comment :post="$post">
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}

{{-- </div> --}}
