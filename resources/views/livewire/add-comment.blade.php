<div>
    {{-- <form method="POST" action="{{ route('comments.store', compact('post')) }}"> --}}
    {{-- @csrf --}}
    <div class="flex items-center justify-between px-3 my-2 gap-1">
        <input type="text" wire:model="comment" name="comment" placeholder="@error('comment') {{ $message }} @enderror"
            class="input w-full" />
        <button class="btn btn-circle btn-sm btn-link" wire:click="postComment" type="button">
            <svg color="#8e8e8e" fill="#8e8e8e" height="24" role="img" viewBox="0 0 24 24" width="24">
                <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22"
                    x2="9.218" y1="3" y2="10.083"></line>
                <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                    stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
            </svg>
        </button>
    </div>
    {{-- </form> --}}
</div>
