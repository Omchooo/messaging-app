{{-- comments modal --}}
{{-- <input type="checkbox" id="my-modal" class="modal-toggle" /> --}}
{{-- <div class="flex fixed top-0 right-0 left-0 bottom-0 justify-center items-center z-50 bg-base-300 bg-opacity-80"> --}}
{{-- <div class="relative"> --}}
{{-- <div class="absolute -right-20 top-2">
                <button class="btn btn-square bg-base-200 text-xl" wire:click='showComponent'>X</button>
            </div> --}}
<div class="container mx-auto max-w-6xl flex flex-col items-center">
    <div class="flex-row max-w-[72rem] card bg-base-200 rounded-none">
        <picture class="flex items-center bg-base-300">
            <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="min-w-[26rem] max-w-md" />
        </picture>
        <div class="divider divider-horizontal mx-0 max-w-[0.125rem]"></div>
        <div class=" w-[38rem] flex flex-col">
            <div class="flex items-center justify-between py-2 px-2 bg-base-300">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        @if ($post->user->getFirstMediaUrl('profile', 'avatar'))
                            <img src="{{ $post->user->getFirstMediaUrl('profile', 'avatar') }}" />
                        @else
                            <img src="https://placeimg.com/192/192/people" />
                        @endif
                    </div>
                    <span class="mx-2 text-lg"><a
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
                    <livewire:follow :user="$user" :wire:key="uniqid()" />
                @endif
            </div>
            {{-- <div class="divider my-0"></div> --}}

            <div class="flex flex-col relative h-full items-center my-1 min-h-[20rem]">
                <div class=" flex flex-col gap-6 min-h-[20rem] h-full w-[calc(100%-0.5rem)] overflow-y-auto absolute">
                    @isset($post->desc)
                        <div class="avatar items-center">
                            {{-- <div class="w-10 rounded-full">
                                                    @if ($post->user->getFirstMediaUrl('profile', 'avatar'))
                                                        <img src="{{ $post->user->getFirstMediaUrl('profile', 'avatar') }}" />
                                                    @else
                                                        <img src="https://placeimg.com/192/192/people" />
                                                    @endif
                                                </div>
                                                <span class="mx-2 truncate max-w-[7.5rem]">{{ $post->user->username }} - </span> --}}
                            <span class="break-all max-w-[24rem] text-lg">{{ $post->desc }}</span>
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
                <livewire:add-comment :post_id="$post->id">
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}

{{-- </div> --}}
