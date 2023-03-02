<div>
    <ul id="users">
        <li>a</li>
    </ul>
    {{-- contacts --}}
    @if ($users)
        @foreach ($users as $user)
        <div class="w-72">
            <div class="flex items-center justify-between mt-2">
                <div class="avatar items-center hover:cursor-pointer">
                    <div class="w-14 rounded-full" id='{{ $user['id']}}'>
                        {{-- {{ $user }} --}}
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                    <span class="mx-2 text-xl w-56 truncate">{{ $user['name'] }}</span>
                </div>
            </div>
        </div>
        <div class="divider my-1"></div>
        @endforeach
    @endif


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
