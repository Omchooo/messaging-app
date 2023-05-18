<div class="max-w-5xl w-full">
    {{-- {{ $state }} --}}
    <div class="gap-8 flex flex-wrap ">
        @isset($posts)
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" class="hover:drop-shadow-2xl">
                    <picture>
                        <img src="{{ $post->getFirstMediaUrl() }}" alt="Image"
                            class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" />
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
                <button class="btn max-w-[10rem] loading w-full" x-bind:class="{ 'hidden': !loading }">loading</button>
            </div>
            {{-- @if ($posts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


        @isset($likedPosts)
            @foreach ($likedPosts as $liked)
                @if ($liked->isLikedBy($this->user))
                    <a href="{{ route('posts.show', $liked->id) }}" class="hover:drop-shadow-2xl">
                        <picture>
                            <img src="{{ $liked->getFirstMediaUrl() }}" alt="Image"
                                class="aspect-1/1 w-80 object-cover rounded-sm shadow-md" />
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
                 <button class="btn max-w-[10rem] loading w-full" x-bind:class="{ 'hidden': !loading }">loading</button>
            </div>

            {{-- @if ($likedPosts->hasMorePages())
                <button wire:click="loadMore" class="btn btn-info btn-outline">Load more</button>
            @endif --}}
        @endisset


        {{-- {{ $user }} --}}


    </div>
</div>
