<div class="max-w-5xl w-full">
    {{-- {{ $state }} --}}
    <div class="gap-8 flex flex-wrap justify-evenly md:justify-start w-full md:max-w-3xl lg:max-w-5xl mx-auto">
        @isset($posts)
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" class="hover:drop-shadow-2xl">
                    <picture class="profile-post-img">
                        {{ $post->getFirstMedia('post')->img('responsive') }}
                        {{-- <img src="{{ $post->getFirstMedia('post')->img('responsive') }}" alt="Image"
                            class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" /> --}}
                    </picture>
                </a>
            @endforeach
            <div class="w-full flex justify-center" x-data="{
                loading: false,
                observe() {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.loading = true;
                                @this.call('loadMore')
                                    .then(() => {
                                        this.loading = false;
                                    });
                            }
                        })
                    }, {
                        root: null
                    })

                    observer.observe(this.$el)
                }
            }" x-init="observe">
                <button class="btn max-w-[10rem] loading w-full md:btn-lg btn-outline border-none" x-bind:class="{ 'hidden': !loading }"></button>
            </div>
            {{-- @if ($posts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


        @isset($likedPosts)
            @foreach ($likedPosts as $liked)
                @if ($liked->isLikedBy($this->user))
                    <a href="{{ route('posts.show', $liked->id) }}" class="hover:drop-shadow-2xl">
                        <picture class="profile-post-img">
                            {{ $liked->getFirstMedia('post')->img('responsive') }}
                            {{-- <img src="{{ $liked->getFirstMedia('post')->img('responsive') }}" alt="Image"
                                class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" /> --}}
                        </picture>
                    </a>
                @endif
            @endforeach
            <div class="w-full flex justify-center" x-data="{
                loading: false,
                observe() {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.loading = true;
                                @this.call('loadMore')
                                    .then(() => {
                                        this.loading = false;
                                    });
                            }
                        })
                    }, {
                        root: null
                    })

                    observer.observe(this.$el)
                }
            }" x-init="observe">
                <button class="btn max-w-[10rem] loading w-full md:btn-lg btn-outline border-none" x-bind:class="{ 'hidden': !loading }"></button>
            </div>

            {{-- @if ($likedPosts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


        @isset($trashedPosts)
            @foreach ($trashedPosts as $post)
            <div class="relative inline-block group">
                <div class="hover:drop-shadow-2xl">
                    <picture class="profile-post-img">
                        {{ $post->getFirstMedia('post')->img('responsive') }}
                        {{-- <img src="{{ $post->getFirstMedia('post')->img('responsive') }}" alt="Image"
                            class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" /> --}}
                    </picture>
                </div>
                <div class="absolute inset-0 gap-5 flex items-center justify-center bg-slate-400 bg-opacity-75 md:opacity-0 opacity-100 md:group-hover:opacity-100 transition-opacity duration-300">
                    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-info">Restore</button>
                    </form>
                    <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
            <div class="w-full flex justify-center" x-data="{
                loading: false,
                observe() {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.loading = true;
                                @this.call('loadMore')
                                    .then(() => {
                                        this.loading = false;
                                    });
                            }
                        })
                    }, {
                        root: null
                    })

                    observer.observe(this.$el)
                }
            }" x-init="observe">
                <button class="btn max-w-[10rem] loading w-full md:btn-lg btn-outline border-none" x-bind:class="{ 'hidden': !loading }"></button>
            </div>

            {{-- @if ($likedPosts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


    </div>
</div>
