@foreach ($posts as $post)
    <a>
        <picture>
            <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="aspect-1/1 w-80 object-cover" />
        </picture>
    </a>
@endforeach
