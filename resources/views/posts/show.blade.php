@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-6xl my-5 flex flex-col items-center">
        <div class="flex-row max-w-[72rem] card bg-base-200 rounded-none">
            <picture class="flex items-center">
                <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="min-w-[26rem] max-w-md" />
            </picture>
            <div class=" w-[38rem] flex flex-col">
                <div class="flex items-center justify-between mt-2 mx-2">
                    <div class="avatar items-center">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                        <span class="mx-2">{{ $post->user->username . ' - ' . $post->id }}</span>
                    </div>
                    <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
                </div>
                <div class="divider my-0"></div>
                <div class="mx-3 my-2 flex flex-col gap-6 min-h-[20rem] h-full overflow-y-auto">
                    @isset($post->desc)
                        <div class="avatar items-center">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                            <span class="mx-2 truncate max-w-[7.5rem]">{{ $post->user->username }} - </span>

                            <span class="break-all max-w-[24rem]">{{ $post->desc }}</span>
                        </div>
                    @endisset

                    {{-- comment with replies --}}
                    @isset($comments)
                        @foreach ($comments as $comment)
                            <div class="flex flex-col gap-4">
                                {{-- comment by user --}}
                                <div class="flex justify-between items-center">
                                    <div class="h-full">
                                        <div class="avatar">
                                            <div class="w-10 rounded-full">
                                                <img src="https://placeimg.com/192/192/people" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="max-w-[30rem] mx-4 flex flex-col w-full items-start">
                                        <p class="w-full"><a
                                                href="{{ route('viewprofile.index', $comment->user) }}">{{ $comment->user->username }}</a>
                                        </p>
                                        <span class="break-words text-sm">{{ $comment->comment }}</span>
                                    </div>
                                    <livewire:likes :comment="$comment">
                                </div>

                                {{-- load more replies --}}
                                {{-- <button class="btn btn-xs loading ml-14 w-32">View replies</button> --}}

                                {{-- replies --}}
                                {{-- <div class="flex justify-between items-center">
                            <div class="h-full">
                                <div class="avatar items-center ml-14">
                                    <div class="w-10 rounded-full">
                                        <img src="https://placeimg.com/192/192/people" />
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-[26rem] mx-4 flex flex-col w-full items-start">
                                <p class=" w-full">username - </p>
                                <span class="break-words text-sm">reply</span>
                            </div>
                            <div>
                                <div
                                    class="btn btn-circle btn-sm btn-link flex justify-center items-center float-right mr-1">
                                    <svg height="12px" width="12px" viewBox="0 0 24 24" fill="#8e8e8e"
                                        color="#8e8e8e  #ed4956">
                                        <path
                                            d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div> --}}

                            </div>
                        @endforeach
                    @endisset
                    {{-- load more comments --}}
                    @if ($comments->hasMorePages())
                        <div class="flex w-full justify-center my-4">
                            <button class="btn btn-xs {{-- loading --}} w-32">Load more</button>
                        </div>
                    @endif
                </div>
                <div class="divider my-0"></div>

                <div class="flex flex-col mx-3">
                    <div class="flex">
                        <livewire:likes :post="$post">
                            </form>
                            {{-- <div class="btn btn-circle btn-sm btn-link">
                            <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                                <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                            </svg>
                        </div> --}}
                    </div>
                    <span class="text-xs my-1">{{ $post->created_at->diffForHumans() }}</span>
                    <div class="divider my-0"></div>
                    <form method="POST" action="{{ route('comments.store', compact('post')) }}">
                        @csrf
                        <div class="flex items-center justify-between px-3 my-2 gap-1">
                            <input type="text" name="comment" placeholder="Add a comment..."
                                class="input input-ghost w-full" />
                            <button class="btn btn-circle btn-sm btn-link" type="submit" >
                                <svg color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
                                    viewBox="0 0 24 24" width="24">
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
            </div>
        </div>
    </div>


    <script>
        $("form").submit(function() {
            $.post($(this).attr("action"), $(this).serialize());
            return false;
        });
    </script>
@endsection
