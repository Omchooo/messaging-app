@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-2xl my-5 mt-0 flex flex-col items-center">
        <a href="{{ route('posts.create') }}" class="btn btn-circle btn-outline bg-base-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
        {{-- <a href="{{ route('posts.show') }}" class="btn btn-circle btn-outline bg-base-200">Posts</a> --}}
        @if ($posts)
            @foreach ($posts as $post)
                @if ($post->user->is_public === 1)
                    <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
                        <div class="flex items-center justify-between my-2 mx-2">
                            <div class="avatar items-center">
                                <div class="w-10 rounded-full">
                                    <img src="https://placeimg.com/192/192/people" />
                                </div>
                                <span class="mx-2"><a
                                        href="{{ route('viewprofile.index', $post->user) }}">{{ $post->user->username }}</a></span>
                            </div>
                            <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
                        </div>
                        <picture class="flex justify-center">
                            <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="w-144" />
                        </picture>
                        <div class="flex flex-col mx-3">
                            <livewire:likes :post="$post" />
                                {{-- <span>{{ $post->likers_count }} likes</span> --}}
                            <livewire:modal :post="$post" />
                                <span class="text-xs my-1">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="divider my-1"></div>
                        <form method="POST" action="{{ route('comments.store', compact('post')) }}">
                            @csrf
                            <div class="flex items-center justify-between px-3 my-2 gap-1">
                                <input type="text" name="comment" placeholder="Add a comment..."
                                    class="input input-ghost w-full" />
                                <button class="btn btn-circle btn-sm btn-link" type="submit">
                                    <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            x1="22" x2="9.218" y1="3" y2="10.083"></line>
                                        <polygon fill="none"
                                            points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                            stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            @endforeach
        @endif
    </div>


    <script>
        $("form").submit(function() {
            $.post($(this).attr("action"), $(this).serialize());
            return false;
        });
    </script>
@endsection
