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
                <span class="my-1 text-2xl max-w-[90%] break-all">{{ $user->full_name }}</span>
                <span class="my-1 text-xl max-w-[90%] truncate">{{ '@' . $user->username }}</span>
                <span class="my-1 text-md max-w-[90%] break-all whitespace-pre-line">{{ $user->bio }}</span>
                <livewire:has-chat :user='$user' :wire:key="uniqid()">
            </div>
        </div>

        <div class="divider"></div>

        <div class="max-w-5xl w-full">
            <livewire:tabs>
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
