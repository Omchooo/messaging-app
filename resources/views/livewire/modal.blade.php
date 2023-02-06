<div>
    @if ($commentsCount)
        <label class="hover:cursor-pointer" wire:click="showComponent">view all {{ $commentsCount }} comments</label>
    @endif

    @if ($showComponent)
        <div class="flex fixed top-0 right-0 left-0 bottom-0 justify-center items-center z-40 bg-base-300 bg-opacity-80">
            <div class="relative">
                <div class="absolute -right-20 top-2 z-50">
                    <button class="btn btn-square btn-outline text-xl" wire:click='showComponent'>X</button>
                </div>
                <livewire:show-modal :post="$post">
            </div>
        </div>
    @endif
</div>
