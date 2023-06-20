@section('title', 'Search • InstaByte')

<div class="max-w-xl w-full flex flex-col items-center gap-8 pb-16 px-2">
    <div class="flex flex-col items-center max-w-md flex-wrap">
        <h2 class="text-lg font-medium max-w-fit">
            Cannot find user you're looking for?
        </h2>
        <p class="mt-1 text-sm max-w-fit">
            Search down below, someone will surely pop up!
        </p>
    </div>

    <input type="text" placeholder="Search here..." wire:model.debounce.300ms='searchInput'
        class="input input-bordered input-accent border-cyan-600 outline-cyan-600 focus:outline-cyan-600 w-full max-w-xs" />

    <div
        class="max-w-xl w-full h-80 rounded-md border-cyan-600 border transition-shadow shadow-md shadow-cyan-600 overflow-y-auto">
        @if (empty($users) && !empty($searchInput))
            <div class="flex w-full justify-center my-4">
                <h2>Sorry, there are no users found</h2>
            </div>
        @else
            @if (empty($users) && empty($searchInput))
                <div class="flex w-full justify-center my-4">
                    <h2>All searched users will pop up here!</h2>
                </div>
            @else
                @foreach ($users as $user)
                    <a href="{{ route('viewprofile.index', $user['username']) }}">
                        <div class="max-w-lg w-full">
                            <div class="flex items-center justify-between mt-2 px-2 w-full">
                                <div class="avatar items-center hover:cursor-pointer">
                                    <div class="w-10 md:w-12 rounded-full">
                                        {{-- {{ $user }} --}}
                                        <img src="{{ $user['userImage'] }}" />
                                    </div>
                                    <span class="mx-2 text-lg md:text-xl max-w-md w-full truncate">
                                        {{ '@' . $user['username'] }} {{ $user['fullName'] ? ' | ' . $user['fullName'] : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="divider my-1"></div>
                @endforeach
            @endif
        @endif
    </div>
</div>
