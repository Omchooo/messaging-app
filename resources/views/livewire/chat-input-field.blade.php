{{-- <div> --}}
    <form wire:submit.prevent="messageReceived">
        {{-- @csrf --}}
        <div class="flex flex-col mx-3">
            <div class="flex items-center justify-between px-3 my-2 gap-1">
                <input type="text" id="message" placeholder="Send a text" class="input input-sm input-accent w-full"
                    wire:model.lazy='message' autocomplete="off" />
                <button id="send" class="btn btn-circle btn-sm btn-link" type="submit">
                    <svg color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
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
{{-- </div> --}}
