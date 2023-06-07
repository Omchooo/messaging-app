@extends('layouts.main')

@section('title', 'Home • InstaByte')

@section('content')
    <div class="container mx-auto max-w-2xl my-5 mt-0 flex flex-col items-center">
        <a href="{{ route('posts.create') }}" class="btn btn-circle btn-outline bg-base-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
        {{-- <a href="{{ route('posts.show') }}" class="btn btn-circle btn-outline bg-base-200">Posts</a> --}}

        <livewire:home>
    </div>


    {{-- <script>
        $("form").submit(function() {
            $.post($(this).attr("action"), $(this).serialize());
            return false;
        });
    </script> --}}
@endsection
