@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container mx-auto my-5 flex flex-col items-center max-w-5xl pb-16">
        <div class="card max-w-sm w-full mx-2 md:mx-0">
            <div class="card-body flex flex-col items-center">
                <div class="avatar items-center">
                    <div class="w-40 profile-squircle">
                        {{ $user->getFirstMedia('profile')->img('avatar') }}
                        {{-- <img class="mask mask-squircle" src="{{ $user->getFirstMedia('profile')->img('avatar') }}" /> --}}
                    </div>
                </div>
                <span class="my-1 text-2xl max-w-[90%] break-all">{{ $user->full_name }}</span>
                <span class="my-1 text-xl max-w-[90%] truncate">{{ '@' . $user->username }}</span>
                <span class="flex justify-evenly my-1max-w-[90%] w-full">
                    <livewire:follow-modal :user="$user" />
                    {{-- <span>{{ $user->followers->count() }} followers</span> --}}
                    {{-- <span>{{ $user->following->count() }} following</span> --}}
                </span>
                <span class="my-1 text-md max-w-[90%] break-all whitespace-pre-line">{{ $user->bio }}</span>
                <livewire:has-chat :user='$user' :wire:key="uniqid()">
            </div>
        </div>

        <div class="divider"></div>

        <div class="max-w-5xl w-full px-2 md:px-0">
            @if ($user->id === auth()->user()->id)
                <livewire:tabs>
            @endif
            {{-- @if (isset($posts)) --}}
            <livewire:posts :user="$user">

                {{-- @else
            <div class="flex justify-center w-full">
                <span>This user has no posts</span>
            </div>
        @endif --}}
        </div>
    </div>
@endsection
