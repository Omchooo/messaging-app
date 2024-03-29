{{-- @section('content') --}}
@section('title', $title)

<div class="drawer drawer-mobile rounded h-full container">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->

        <div class="w-full h-full flex flex-col">
            <div class="flex items-center justify-between mt-2 mx-2">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        {{ $otherChatUser->getFirstMedia('profile')->img('avatar') }}
                    </div>
                    <a href="{{ route('viewprofile.index', $otherChatUser->username) }}"><span
                            class="mx-2">{{ $otherChatUser->full_name ?? $otherChatUser->username }}</span></a>
                </div>
                <livewire:follow :user="$otherChatUser" :wire:key="uniqid()" />
            </div>
            <div class="divider my-0"></div>
            {{-- <div class="mx-3 my-2 flex flex-col gap-4 h-full overflow-y-auto"> --}}




            {{-- <li>{{ auth()->user()->id }}</li> --}}
            <livewire:chat-messages :wire:key="'messages-'.uniqid()" :chatId="$otherChatUser->chats[0]->id">
                {{-- </div> --}}


                {{-- <div class="divider my-0"></div> --}}
            <livewire:chat-input-field :wire:key="'input-'.uniqid()" :uuid="$uuid" :chatId="$otherChatUser->chats[0]->id"
                :chatUuid="$otherChatUser->chats[0]->uuid">
        </div>

    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="menu flex-row px-4 py-2 w-80 h-full bg-base-200 text-base-content">
            <!-- Sidebar content here -->
            <div class="w-full overflow-y-auto">

                <livewire:online-chat-users :wire:key="'online-users-'.uniqid()" :allUsers="$users" :chatId="$otherChatUser->chats[0]->id">
                    {{-- @foreach ($allChatRooms as $chatRoom)
                {{ $chatRoom->username }}
            @endforeach --}}
            </div>
        </ul>

    </div>
</div>

{{-- <div class="container mx-auto max-h-[764px] flex justify-center">
    <div class="flex-row card bg-base-200 rounded-none h-[48rem]">

        <div class="divider divider-horizontal mx-0"></div>

        livewire chat

    </div>
</div> --}}






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
