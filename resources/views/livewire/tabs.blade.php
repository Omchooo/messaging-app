<div>
    <div class="tabs my-8 flex justify-center">
        <button wire:click='updateState(0)' class="tab tab-bordered {{ ($state == '0') ? 'tab-active' : ''}}">Posts</button>
        <button wire:click='updateState(1)' class="tab tab-bordered {{ ($state == '1') ? 'tab-active' : ''}}">Liked</button>
        <button wire:click='updateState(2)' class="tab tab-bordered {{ ($state == '2') ? 'tab-active' : ''}}">Deleted</button>
        {{-- {{ $state }} --}}
    </div>


</div>
