@extends('layouts.main')

@section('title', 'Edit post • InstaByte')

@section('content')
    @if ($message = session('message'))
        <div class="alert alert-success shadow-lg max-w-2xl">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    @endif
    @error('desc')
        <div class="alert alert-error shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    @enderror

    <div class="container mx-auto max-w-2xl my-5 flex flex-col items-center pb-16">
        <div class="card max-w-md w-full md:w-144 shadow my-4 rounded p-4">
            <form method="POST" action="{{ route('posts.update', compact('post')) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class=" mb-2">


                    <picture class="flex justify-center max-w-xl min-h-[20rem] bg-base-300 rounded edit-post-img">
                        {{-- <input type="file" name="image" id="image" class="file-input file-input-ghost w-full max-w-xs absolute self-center" /> --}}
                        {{-- <img src="{{ $post->getFirstMediaUrl('post') }}" alt="Image" class="rounded-t-2xl" /> --}}
                        {{ $post->getFirstMedia('post')->img('responsive') }}
                    </picture>
                </div>
                <div class="flex flex-col">
                    <textarea class="textarea textarea-bordered" id="desc" name="desc" placeholder="Current description: {{ $post->desc }}"></textarea>
                </div>
                {{-- <div class="divider my-1"></div> --}}
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-sm btn-active btn-outline px-8 h-9 mt-4">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
