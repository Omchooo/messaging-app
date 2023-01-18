<div class="gap-8 flex flex-wrap ">
    @foreach ($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}">
            <picture>
                <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="aspect-1/1 w-80 object-cover" />
            </picture>
        </a>
    @endforeach
    {{-- {{ $user }} --}}

    @if ($posts->hasMorePages())
        <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
    @endif
</div>
