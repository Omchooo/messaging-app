@extends('layouts.main')

@section('title', 'Notifications • InstaByte')

@section('content')

    {{-- @if ($message = session('message'))
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
    @enderror --}}

    <div class="container md:mx-auto max-w-lg my-5 px-2 flex flex-col items-center pb-16 border border-red-400">
        <div class="card w-full shadow my-4 rounded p-4 border border-blue-700 gap-2">
            @isset($allNotifications)
                @foreach ($allNotifications as $notification)
                    <div class="flex justify-between items-center w-full border border-green-600 p-2">
                        <a href="{{ route('viewprofile.index', $notification['senderName']) }}" class="avatar">
                            <div class="w-10 md:w-12 rounded-full">
                                <img src="{{ $notification['senderImage'] }}" />
                            </div>
                        </a>

                        <span class="mx-2 text-sm md:text-base flex-1">
                            <span class="font-semibold"><a href="{{ route('viewprofile.index', $notification['senderName']) }}">{{ $notification['senderName'] }}</a></span>
                            {{ $notification['message'] }}
                            <span class="text-xs text-gray-400 ml-2 text-right">{{ $notification['sentAt'] }}</span>
                        </span>

                        <div class="flex w-max">
                            @if (isset($notification['postId']))
                                <div class="avatar">
                                    <div class="w-10 md:w-12">
                                        {{-- <img src="{{ $notification['postImage'] }}" /> --}}
                                        <a href="{{ route('posts.show', $notification['postId']) }}">
                                            {{ $notification['postImage'] }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <livewire:follow :user="$notification['senderId']" :wire:key="uniqid()">
                            @endif
                        </div>
                    </div>
                @endforeach
            @endisset

            {{-- <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"">
                @csrf
                
            </form> --}}
        </div>
    </div>


@endsection
