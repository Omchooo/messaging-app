<div class="flex flex-col gap-2">
    {{-- contacts --}}
    @if ($allUsers)
        @foreach ($allUsers as $user)
            <a href="{{ route('inbox.chat', $user['chatUuid']) }}" class="rounded hover:bg-base-100 p-2">
                <div class="flex w-full">
                    <div class="flex w-full items-center justify-between">
                        <div class="avatar w-full items-center hover:cursor-pointer">
                            <div class="w-14 md:w-16 rounded-full">
                                @if ($user['userImage'])
                                    {{ $user['userImage'] }}
                                @else
                                    <img src="https://placeimg.com/192/192/people" />
                                @endif
                            </div>
                            <span
                                class="flex flex-col items-start w-full mx-2 text-lg truncate leading-5">{{ $user['fullName'] ?? $user['userName'] }}
                                <p class="text-sm max-w-[11rem] truncate text-gray-400">{{ $user['lastMessage'] }}</p>
                            </span>
                            <span class="text-xs w-10 truncate text-gray-400">{{ $user['lastMessageSentAt'] }}</span>
                        </div>
                    </div>
                </div>
            </a>
            {{-- <div class="divider my-1"></div> --}}
        @endforeach
    @else
        <h2>No users to show, get some friends first!</h2>
    @endif




    {{-- @if ($users)
        @foreach ($users as $user)
        <div class="w-72">
            <div class="flex items-center justify-between mt-2">
                <div class="avatar items-center hover:cursor-pointer">
                    <div class="w-14 rounded-full" id='{{ $user['id']}}'>
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                    <span class="mx-2 text-xl w-56 truncate">{{ $user['name'] }}</span>
                </div>
            </div>
        </div>
        <div class="divider my-1"></div>
        @endforeach
    @endif  --}}


</div>

@push('scripts')
    <script>
        window.onload = function() {
            // const usersElement = document.getElementById('users');
            // const messagesElement = document.getElementById('messages');
            // let isOnline = document.getElementById('profile')

            // Echo.join('chat')
            //     .here((users) => {
            //         users.forEach((user) => {
            //             let element = document.createElement('li');

            //             element.setAttribute('id', user.id);
            //             element.setAttribute('onclick', 'greetUser("' + user.id + '")');
            //             element.innerText = user.name;
            //             // isOnline.classList.remove('offline');
            //             // isOnline.classList.add('online');

            //             usersElement.appendChild(element);
            //         });
            //     })
            //     .joining((user) => {
            //         let element = document.createElement('li');

            //         element.setAttribute('id', user.id);
            //         element.setAttribute('onclick', 'greetUser("' + user.id + '")');
            //         element.innerText = user.name;

            //         usersElement.appendChild(element);
            //     })
            //     .leaving((user) => {
            //         const element = document.getElementById(user.id);

            //         element.parentNode.removeChild(element);
            //     })
            // .listen('MessageSent', (e) => {
            //     let element = document.createElement('li');

            //     element.innerText = e.user.username + ': ' + e.message;

            //     messagesElement.appendChild(element);
            // })

            Echo.private('inbox.greet.{{ auth()->user()->id }}')
                .listen('GreetingSent', (e) => {
                    let element = document.createElement('li');
                    element.innerText = e.message;
                    // element.classList.add('text-success');
                    messagesElement.appendChild(element);
                });
        }
    </script>

    <script>
        function greetUser(id) {
            window.axios.post('/inbox/greet/' + id);
        }
    </script>
@endpush
