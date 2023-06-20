@extends('layouts.main')

@section('title', 'Home • InstaByte')

@section('content')
    <div class="container md:mx-auto my-5 mt-0 flex flex-row justify-center relative px-4 pb-14 ">
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
