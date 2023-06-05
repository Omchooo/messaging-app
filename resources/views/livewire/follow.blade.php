<button class="btn {{ $buttonClasses }} btn-{{ $isFollowing ? 'neutral' : 'info' }} "
    wire:click='setFollow'>{{ $isFollowing ? 'following' : 'follow' }}</button>
