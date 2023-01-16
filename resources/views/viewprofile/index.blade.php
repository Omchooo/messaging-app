@extends('layouts.main')

@section('content')

    <div class="container mx-auto my-5 flex flex-col items-center max-w-5xl">
        <div class="card w-96 bg-base-200 border border-gray-600 shadow-xl">
            <div class="card-body flex flex-col items-center">
                <div class="avatar items-center">
                    <div class="w-40">
                        <img class="mask mask-squircle" src="https://placeimg.com/160/160/arch" />
                    </div>
                </div>
                <span class="my-1 text-2xl max-w-[90%] break-all">Name and Surname</span>
                <span class="my-1 text-xl max-w-[90%] truncate">{{ $user->name }}</span>
                <span
                    class="my-1 text-md max-w-[90%] break-all whitespace-pre-line">BioBioBioBioBioBioBioBioBioBioBioBioBioBioBioBioBioBioBioBio</span>
                <div class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">follow</div> {{-- btn-neutral if following --}}
            </div>
        </div>

        <div class="divider"></div>

        <div class="max-w-5xl w-full flex flex-col items-center">
            <div class="tabs my-8">
                <a class="tab tab-bordered tab-active">Posts</a>
                <a class="tab tab-bordered">Liked</a>
                <a class="tab tab-bordered">Deleted</a>
            </div>
            <div class="max-w-5xl w-full gap-8 flex flex-wrap ">
                @if ($posts === '')
                    @foreach ($posts as $post)
                        <a>
                            <figure>
                                <img src="{{ $post->getFirstMediaUrl() }}" alt="Image" class="aspect-1/1 w-80" />
                            </figure>
                        </a>
                    @endforeach
                @else
                    <div class="flex justify-center w-full">
                        <span>This user has no posts</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
