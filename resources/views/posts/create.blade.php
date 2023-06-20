@extends('layouts.main')

@section('title', 'Create new post • InstaByte')

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
    @error('image')
        <div class="alert alert-error shadow-lg max-w-2xl">
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

    <div class="container md:mx-auto max-w-2xl my-5 px-2 flex flex-col items-center pb-16">
        <livewire:upload-post />
    </div>


@endsection
