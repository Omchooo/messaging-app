<div class="fixed bottom-14 left-0 mx-14 {{ $visibility }}">
    <div class="card max-w-sm w-full bg-base-300 shadow-sm relative">
        <div class="card-body p-3 w-full min-w-[16rem] min-h-[3rem]">
            <button class="btn btn-square btn-sm absolute top-2 right-2" wire:click='closeNotification'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            {{-- <p class="mr-10">USER sent you a new message!</p> --}}
            @isset($newNotifications)
                @foreach ($newNotifications as $notification)
                    <div class="mr-10 flex items-center gap-2">
                        <div class="avatar">
                            <div class="w-8 rounded-full">
                                <a href="{{ route('inbox.chat', $notification['chatRoom']) }}"><img src="{{ $notification['senderImg'] }}" /></a>
                            </div>
                        </div>
                        <a href="{{ route('inbox.chat', $notification['chatRoom']) }}"
                            class="font-semibold">{{ $notification['sender'] }}</a> has sent you
                        {{ $notification['count'] }} new messages
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>
