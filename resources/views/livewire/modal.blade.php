<div>
    {{-- @if ($commentsCount) --}}
    <label class="hover:cursor-pointer" wire:click="showComponent">
        <svg width="28" height="28" viewBox="-2.4 -2.4 28.80 28.80" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#8e8e8e">
            <path
                d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z">
            </path>
        </svg>
    </label>
    {{-- @endif --}}

    @if ($showComponent)
        <div class="flex fixed top-0 right-0 left-0 bottom-0 justify-center items-center z-40 bg-base-300 bg-opacity-80">
            <div class="relative h-full w-full md:h-auto md:w-auto">
                <livewire:show-modal :post="$post">
            </div>
        </div>
    @endif
</div>
