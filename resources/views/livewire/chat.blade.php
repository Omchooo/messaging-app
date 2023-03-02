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


        {{-- receiver --}}
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

        {{-- sender --}}
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

        @isset($newMessage)
                @foreach ($newMessage as $index => $nMsg)
                <div class="chat chat-end" wire:key='new-message-{{ $index }}'>
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div>
                    <div class="chat-header">
                        Anakin
                        <time class="text-xs opacity-50">12:46</time>
                    </div>
                    <div class="chat-bubble">{{ $nMsg }}</div>
                    <div class="chat-footer opacity-50">
                        Seen at 12:46
                    </div>
                </div>
                @endforeach
            @endisset
    </div>
    <div class="divider my-0"></div>
    <form wire:submit.prevent="messageReceived">
        {{-- @csrf --}}
        <div class="flex flex-col mx-3">
            <div class="flex items-center justify-between px-3 my-2 gap-1">
                <input type="text" id="message" placeholder="Send a text" class="input input-accent w-full" wire:model.lazy='message' />
                <button id="send" class="btn btn-circle btn-sm btn-link" type="submit">
                    <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
                        viewBox="0 0 24 24" width="24">
                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            x1="22" x2="9.218" y1="3" y2="10.083"></line>
                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                    </svg>
                </button>
            </div>
        </div>
    </form>
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
