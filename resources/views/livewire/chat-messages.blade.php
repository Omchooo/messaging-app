<div class="mx-3 my-2 flex flex-col gap-4 h-full overflow-y-auto scroll-smooth relative" id="chat-output">
    @isset($oldMessages)
    <div class="w-full flex justify-center" x-data="{
        loading: false,
        observe() {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.loading = true;
                        @this.call('loadMoreMessages')
                            .then(() => {
                                this.loading = false;
                            });
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }" x-init="observe">
        <button class="btn btn-xs before:ml-2 loading" x-bind:class="{ 'hidden': !loading }"></button>
    </div>
    @endisset

    {{-- <div id="scroll-height"> --}}

    @isset($oldMessages)
        @foreach ($oldMessages as $oMsg)
            @if ($oMsg['isAuthor'])
                {{-- sender --}}
                <div class="chat chat-end">
                    {{-- <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div> --}}
                    <div class="chat-header">
                        {{ $oMsg['sender'] }}
                        {{-- {{ $oMsg['isAuthor'] }} --}}
                        <time class="text-xs opacity-50">{{ $oMsg['sentAt'] }}</time>
                    </div>
                    <div class="chat-bubble">{{ $oMsg['message'] }}</div>
                    {{-- <div class="chat-footer opacity-50">
                        Seen at 12:46
                    </div> --}}
                </div>
            @else
                {{-- receiver --}}
                <div class="chat chat-start">
                    {{-- <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div> --}}
                    <div class="chat-header">
                        {{ $oMsg['sender'] }}
                        <time class="text-xs opacity-50">{{ $oMsg['sentAt'] }}</time>
                    </div>
                    <div class="chat-bubble">{{ $oMsg['message'] }}
                    </div>
                    {{-- <div class="chat-footer opacity-50">
                        Delivered
                    </div> --}}
                </div>
            @endif
        @endforeach
    @endisset

    @isset($newMessage)
        @foreach ($newMessage as $nMsg)
            @if ($nMsg['isAuthor'])
                {{-- sender --}}
                <div class="chat chat-end">
                    {{-- <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div> --}}
                    <div class="chat-header">
                        {{ $nMsg['sender'] }}
                        {{-- {{ $nMsg['isAuthor'] }} --}}
                        <time class="text-xs opacity-50">just now</time>
                    </div>
                    <div class="chat-bubble">{{ $nMsg['message'] }}</div>
                    {{-- <div class="chat-footer opacity-50">
                        Seen at 12:46
                    </div> --}}
                </div>
            @else
                {{-- receiver --}}
                <div class="chat chat-start">
                    {{-- <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div> --}}
                    <div class="chat-header">
                        {{ $nMsg['sender'] }}
                        <time class="text-xs opacity-50">just now</time>
                    </div>
                    <div class="chat-bubble">{{ $nMsg['message'] }}
                    </div>
                    {{-- <div class="chat-footer opacity-50">
                        Delivered
                    </div> --}}
                </div>
            @endif
        @endforeach
    @endisset
    <button class="btn btn-sm btn-circle btn-outline w-14 justify-evenly sticky bottom-2 left-2/4 hidden"
        id="scroll-down">
        {{ $messageCount ? '+' . $messageCount : '' }}
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" fill="none"
            class="h-6 w-6">
            <path transform="rotate(180 12 11.705)"
                d="m7.41,15.41l4.59,-4.58l4.59,4.58l1.41,-1.41l-6,-6l-6,6l1.41,1.41z" stroke-width="2"
                stroke-linejoin="round" stroke-linecap="round" />
        </svg>
    </button>

    {{-- </div> --}}
</div>

@push('scripts')
    <script>
        //ovdje ispitati da li je messageCount jednak ili veci od 1, ako jeste da scrolla dole ako user nije skrollao vise od 100px gore
        const btnScroll = document.getElementById('scroll-down');
        const bodyHeight = document.getElementById('chat-output');
        let highestBodyHeight = bodyHeight.scrollTop;


        // btnScroll.style.display = "none";
        bodyHeight.scrollTo({
            top: bodyHeight.scrollHeight,
            left: 0,
            behavior: "instant"
        });

        window.onload = () => {
            btnScroll.onclick = () => {
                bodyHeight.scrollTo(0, bodyHeight.scrollHeight);
                Livewire.emit('resetCount');
            };

            Livewire.on('messageCountUpdated', function(messageCount) {
                // console.log(messageCount);
                if (messageCount >= 1 && bodyHeight.scrollTop > (highestBodyHeight - 100)) {
                    bodyHeight.scrollTo(0, bodyHeight.scrollHeight);
                    Livewire.emit('resetCount');
                }
            });

            bodyHeight.addEventListener('scroll', () => {
                if (bodyHeight.scrollTop > highestBodyHeight) {
                    highestBodyHeight = bodyHeight.scrollTop;
                }
                // console.log(highestBodyHeight);

                if (bodyHeight.scrollTop < (highestBodyHeight - 100)) {
                    btnScroll.style.display = "inline-flex";
                } else {
                    btnScroll.style.display = "none";
                }
            });
        };
    </script>
@endpush
