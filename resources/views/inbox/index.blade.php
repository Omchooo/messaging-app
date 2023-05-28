@extends('layouts.main')


@section('content')
    <div class="container mx-auto max-h-[764px] flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">
                {{-- <livewire:online-chat-users> --}}
                <livewire:online-chat-users :wire:key="'online-users-'.uniqid()" :allUsers="$users">
            </div>
            <div class="divider divider-horizontal mx-0"></div>

            {{-- livewire chat --}}
            {{-- @yield('chat') --}}
            {{-- <livewire:chat> --}}

            <livewire:user-search>
        </div>
    </div>
@endsection
