<div>
    @if ($isOwner)
        <a href="{{ url('profile') }}" class="btn btn-info btn-lg btn-outline text-xs min-h-[2.5rem] h-10">manage</a> {{-- btn-neutral if following --}}
    @else
        <div class="flex gap-2">
            <div class="indicator">
                <livewire:follow :user="$user" buttonClasses="btn-lg btn-outline text-xs min-h-[2.5rem] h-10" :wire:key="uniqid()" />
            </div>
            <button wire:click='getOrCreateChatRoom' class="btn btn-ghost btn-lg btn-outline text-xs min-h-[2.5rem] h-10">message</button>
        </div>
    @endif
</div>
