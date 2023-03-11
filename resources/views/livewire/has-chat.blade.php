<div>
    @if ($isOwner)
        <div class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">manage</div> {{-- btn-neutral if following --}}
    @else
        <div class="flex gap-2">
            <div class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">follow</div>
            <button wire:click='getOrCreateChatRoom' class="btn btn-ghost btn-lg btn-outline text-xs min-h-[2.5rem] h-10">message</button>
        </div>
    @endif
</div>
