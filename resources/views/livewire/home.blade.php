<div>
    @if ($posts)
        @foreach ($posts as $post)
            @if ($post->user->is_public === 1)
                <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
                    <div class="flex items-center justify-between my-2 mx-2">
                        <div class="avatar items-center">
                            <div class="w-10 rounded-full">
                                @if ($post->user->getFirstMediaUrl('profile', 'avatar'))
                                    <img src="{{ $post->user->getFirstMediaUrl('profile', 'avatar') }}" />
                                @else
                                    <img src="https://placeimg.com/192/192/people" />
                                @endif
                            </div>
                            <span class="mx-2"><a
                                    href="{{ route('viewprofile.index', $post->user) }}">{{ $post->user->full_name ?? $post->user->username }}</a></span>
                        </div>
                        <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
                    </div>
                    <picture class="flex justify-center">
                        <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="w-144" />
                    </picture>
                    <div class="flex flex-col mx-3">
                        <livewire:likes :post="$post" :wire:key="time().$post->id" />
                        {{-- <span>{{ $post->likers_count }} likes</span> --}}
                        <livewire:modal :post="$post" :wire:key="uniqid().time()" />
                        <span class="text-xs my-1">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="divider my-1"></div>
                    <livewire:add-comment :post_id="$post->id" :wire:key="uniqid()">
                </div>
            @endif
        @endforeach
        <div x-data="{
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
            <button class="btn loading w-full" x-bind:class="{ 'hidden': !loading }">loading</button>
        </div>
    @endif
</div>
