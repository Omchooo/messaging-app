@extends('layouts.main')

@section('content')
    <div class="container mx-auto my-5 flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">
                <ul id="users">
                    <li>test1</li>
                </ul>
                {{-- contacts --}}
                <div class="w-72">
                    <div class="flex items-center justify-between mt-2">
                        <div class="avatar items-center hover:cursor-pointer">
                            <div class="w-14 rounded-full" id="profile">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                            <span class="mx-2 text-xl w-56 truncate">usernameeeeeeeeeeeeeeeeeeeeeeeeeee</span>
                        </div>
                    </div>
                </div>
                <div class="divider my-1"></div>


                {{-- end foreach here --}}
            </div>
            <div class="divider divider-horizontal mx-0"></div>
            <div class="w-[38rem] flex flex-col">
                <div class="flex items-center justify-between mt-2 mx-2">
                    <div class="avatar items-center">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                        <span class="mx-2">username</span>
                    </div>
                    <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
                </div>
                <div class="divider my-0"></div>
                <div class="mx-3 my-2 flex flex-col-reverse gap-6 h-full overflow-y-auto" style="overflow-anchor: none;">
                    {{-- use latest messages first to load them at bottom --}}

                    {{-- sender --}}
                    <div class="chat chat-start">
                        <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                        </div>
                        <div class="chat-header">
                            Obi-Wan Kenobi
                            <time class="text-xs opacity-50">12:45</time>
                        </div>
                        <div class="chat-bubble">newest text
                        </div>
                        <div class="chat-footer opacity-50">
                            Delivered
                        </div>
                    </div>

                    {{-- receiver --}}
                    <div class="chat chat-end">
                        <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                        </div>
                        <div class="chat-header">
                            Anakin
                            <time class="text-xs opacity-50">12:46</time>
                        </div>
                        <div class="chat-bubble">older text</div>
                        <div class="chat-footer opacity-50">
                            Seen at 12:46
                        </div>
                    </div>
                </div>
                <div class="divider my-0"></div>
                <div class="flex flex-col mx-3">
                    <div class="flex items-center justify-between px-3 my-2 gap-1">
                        <input type="text" placeholder="Add a comment..." class="input input-ghost w-full" />
                        <div class="btn btn-circle btn-sm btn-link">
                            <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
                                viewBox="0 0 24 24" width="24">
                                <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    x1="22" x2="9.218" y1="3" y2="10.083"></line>
                                <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                    stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.onload = function() {
                const usersElement = document.getElementById('users');
                const messagesElement = document.getElementById('messages');
                // let isOnline = document.getElementById('profile')

                Echo.join('chat')
                    .here((users) => {
                        users.forEach((user) => {
                            let element = document.createElement('li');

                            element.setAttribute('id', user.id);
                            element.innerText = user.name;
                            // isOnline.classList.remove('offline');
                            // isOnline.classList.add('online');

                            usersElement.appendChild(element);
                        });
                    })
                    .joining()
                    .leaving()
            }
        </script>
    @endpush
@endsection
