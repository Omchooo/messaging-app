{{-- @section('content') --}}

    <div class="container mx-auto my-5 flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">

                <livewire:online-chat-users :wire:key="'online-users-'.uniqid()" :allUsers="$users">
                    {{-- @foreach ($allChatRooms as $chatRoom)
                        {{ $chatRoom->username }}
                    @endforeach --}}
            </div>
            <div class="divider divider-horizontal mx-0"></div>

            {{-- livewire chat --}}
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
                <div class="mx-3 my-2 flex flex-col gap-4 h-full overflow-y-auto" style="overflow-anchor: none;">




                    {{-- <li>{{ auth()->user()->id }}</li> --}}
                <livewire:chat-messages :wire:key="'messages-'.uniqid()">


                <div class="divider my-0"></div>
                <livewire:chat-input-field :wire:key="'input-'.uniqid()">
            </div>
        </div>
    </div>






    {{-- @push('scripts') --}}
    {{-- <script>
    window.onload = function() {
        const usersElement = document.getElementById('users');
        const messagesElement = document.getElementById('messages');
        // let isOnline = document.getElementById('profile')

        Echo.join('chat')
            .listen('MessageSent', (e) => {
                let element = document.createElement('li');

                element.innerText = e.user.username + ': ' + e.message;

                messagesElement.appendChild(element);
            })


    }
</script> --}}
    {{--
<script>
    const sendElement = document.getElementById('send');
    const messageElement = document.getElementById('message');

    sendElement.addEventListener('click', (e) => {
        e.preventDefault();

        window.axios.post('/inbox/message', {
            message: messageElement.value,
        });

        messageElement.value = '';
    });
</script> --}}
    {{-- @endpush --}}
{{-- @endsection --}}
