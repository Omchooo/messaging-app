<div>
    @if ($isOwner)
        <div class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">manage</div> {{-- btn-neutral if following --}}
    @else
        <div class="flex gap-2">
            <div class="indicator">
                <span class="indicator-item indicator-start left-2 badge w-24 text-xs badge-secondary">Coming Soon</span>
                <div class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">follow</div>
            </div>
            <button wire:click='getOrCreateChatRoom' class="btn btn-ghost btn-lg btn-outline text-xs min-h-[2.5rem] h-10">message</button>
        </div>
    @endif
</div>
