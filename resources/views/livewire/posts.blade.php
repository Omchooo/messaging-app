<div class="max-w-5xl w-full">
    {{ $state }}
    <div class="gap-8 flex flex-wrap ">
        @isset($posts)
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}">
                    <picture>
                        <img src="{{ $post->getFirstMediaUrl() }}" alt="Image"
                            class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" />
                    </picture>
                </a>
            @endforeach
            @if ($posts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif
        @endisset


        @isset($likedPosts)
            @foreach ($likedPosts as $liked)
                @if ($liked->isLikedBy($this->user))
                    <a href="{{ route('posts.show', $liked->id) }}">
                        <picture>
                            <img src="{{ $liked->getFirstMediaUrl() }}" alt="Image"
                                class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" />
                        </picture>
                    </a>
                @endif
            @endforeach
            {{-- @if ($likedPosts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


        {{-- {{ $user }} --}}


    </div>
</div>
