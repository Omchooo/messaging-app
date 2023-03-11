<div>
    @isset($newMessage)
        @foreach ($newMessage as $nMsg)
            @if ($nMsg['isAuthor'])
                {{-- sender --}}
                <div class="chat chat-end">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div>
                    <div class="chat-header">
                        {{ $nMsg['sender'] }}
                        {{-- {{ $nMsg['isAuthor'] }} --}}
                        <time class="text-xs opacity-50">just now</time>
                    </div>
                    <div class="chat-bubble">{{ $nMsg['message'] }}</div>
                    <div class="chat-footer opacity-50">
                        Seen at 12:46
                    </div>
                </div>
            @else
                {{-- receiver --}}
                <div class="chat chat-start">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div>
                    <div class="chat-header">
                        {{ $nMsg['sender'] }}
                        <time class="text-xs opacity-50">just now</time>
                    </div>
                    <div class="chat-bubble">{{ $nMsg['message'] }}
                    </div>
                    <div class="chat-footer opacity-50">
                        Delivered
                    </div>
                </div>
            @endif
        @endforeach
    @endisset
</div>
</div>
