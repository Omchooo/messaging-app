@extends('layouts.main')

@section('title', 'Create new post • InstaByte')

@section('content')

@if ($message = session('message'))
<div class="alert alert-success shadow-lg max-w-2xl">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>{{ $message }}</span>
    </div>
</div>
@endif

<div class="container mx-auto max-w-2xl my-5 flex flex-col items-center">
    <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-4 ">
                @error('image')
                <div class="alert alert-error shadow-lg">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>{{ $message }}</span>
                    </div>
                  </div>
                @enderror

                <figure class="pt-2 max-w-xl min-h-[20rem]">
                    <input type="file" name="image" id="image" class="file-input file-input-ghost w-full max-w-xs absolute self-center" />
                    {{-- <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" /> --}}
                </figure>
            </div>
            <div class="flex flex-col mx-3">
                <textarea class="textarea textarea-bordered" id="desc" name="desc" placeholder="Description">{{ old('desc') }}</textarea>
            </div>
            <div class="divider my-1"></div>
            <div class="flex justify-center mb-2">
                <button type="submit" class="btn btn-outline btn-accent">Post</button>
            </div>
        </form>
    </div>
</div>

@endsection
