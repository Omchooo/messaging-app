@extends('layouts.main')

@section('title', 'Inbox • InstaByte')

@section('content')

<div class="drawer drawer-mobile rounded h-full max-h-[32rem] md:max-h-[48rem] container">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->

        {{-- <livewire:user-search> --}}

        <div class="flex flex-col w-full h-full justify-center items-center">
            <span class="md:text-lg font-medium">Select a chat or start a new conversation</span>
        </div>

    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="menu flex-row px-4 py-2 w-80 h-full bg-base-200 text-base-content">
            <!-- Sidebar content here -->
            <div class="w-full overflow-y-auto">

                <livewire:online-chat-users :wire:key="'online-users-'.uniqid()" :allUsers="$users">
                    {{-- @foreach ($allChatRooms as $chatRoom)
                {{ $chatRoom->username }}
            @endforeach --}}
            </div>
        </ul>

    </div>
</div>


    {{-- <div class="container mx-auto max-h-[764px] flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">
                <livewire:online-chat-users :wire:key="'online-users-'.uniqid()" :allUsers="$users">
            </div>
            <div class="divider divider-horizontal mx-0"></div>


            <livewire:user-search>
        </div>
    </div> --}}
@endsection
