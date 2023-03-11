@extends('layouts.main')


@section('content')
    <div class="container mx-auto my-5 flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">
                <livewire:online-chat-users>
            </div>
            <div class="divider divider-horizontal mx-0"></div>

            {{-- livewire chat --}}
            @yield('chat')
            {{-- <livewire:chat> --}}

            <div class="w-[38rem] flex flex-col items-center gap-12">
                        <div class="flex flex-col items-center max-w-md flex-wrap mt-16">
                            <h2 class="text-lg font-medium max-w-fit">
                                Cannot find user you're looking for?
                            </h2>
                            <p class="mt-1 text-sm max-w-fit">
                                Search down below, he will surely pop up!
                            </p>
                        </div>

                        <input type="text" placeholder="Search here..." class="input input-bordered input-accent border-cyan-600 outline-cyan-600 focus:outline-cyan-600 w-full max-w-xs" />

                        <div class="w-[35rem] h-[27rem] rounded-md border-cyan-600 border transition-shadow shadow-md shadow-cyan-600 overflow-y-auto">
                            <div class="flex w-full justify-center my-4">
                                <h2>sorry there are no users found</h2>
                            </div>
                            <div class="w-[32rem]">
                                <div class="flex items-center justify-between mt-2 ml-2">
                                    <div class="avatar items-center hover:cursor-pointer">
                                        <div class="w-12 rounded-full" >
                                            {{-- {{ $user }} --}}
                                            <img src="https://placeimg.com/192/192/people" />
                                        </div>
                                        <span class="mx-2 text-xl w-[26rem] truncate">user</span>
                                    </div>
                                </div>
                            </div>
                            <div class="divider my-1"></div>

                        </div>
            </div>
        </div>
    </div>


@endsection
