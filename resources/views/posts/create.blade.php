@extends('layouts.main')

@section('content')

<div class="container mx-auto max-w-2xl my-5 flex flex-col items-center">
    <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf


            <figure class="pt-2 max-w-xl min-h-[20rem]">
                <input type="file" name="image" id="image" class="file-input file-input-ghost w-full max-w-xs absolute self-center" />
                {{-- <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" /> --}}
            </figure>
            <div class="flex flex-col mx-3">
                <textarea class="textarea textarea-bordered" id="desc" name="desc" placeholder="Bio"></textarea>
            </div>
            <div class="divider my-1"></div>
            <div class="flex justify-center mb-2">
                <button type="submit" class="btn btn-outline btn-accent">Post</button>
            </div>
        </form>
    </div>
</div>

@endsection
