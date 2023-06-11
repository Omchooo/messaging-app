<div>
    @if ($posts)
        @foreach ($posts as $post)
            @if ($post->user->is_public === 1)
                <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
                    <div class="flex items-center justify-between my-2 mx-2">
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
                    </div>
                    <picture class="flex justify-center home-img">
                        {{ $post->getFirstMedia('post')->img('responsive') }}
                    </picture>
                    <div class="flex flex-col mx-3">
                        <livewire:likes :post="$post" :wire:key="time().$post->id" />
                        {{-- <span>{{ $post->likers_count }} likes</span> --}}
                        <livewire:modal :post="$post" :wire:key="uniqid().time()" />
                        <span class="text-xs my-1">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="divider my-1"></div>
                    <livewire:add-comment :post_id="$post->id" :wire:key="uniqid()" />
                </div>
            @endif
        @endforeach
        <x-loading />
    @endif
</div>
