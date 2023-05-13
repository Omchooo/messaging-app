<div class="w-[38rem] flex flex-col items-center gap-12">
    <div class="flex flex-col items-center max-w-md flex-wrap mt-16">
        <h2 class="text-lg font-medium max-w-fit">
            Cannot find user you're looking for?
        </h2>
        <p class="mt-1 text-sm max-w-fit">
            Search down below, user will surely pop up!
        </p>
    </div>

    <input type="text" placeholder="Search here..." wire:model.debounce.300ms='searchInput'
        class="input input-bordered input-accent border-cyan-600 outline-cyan-600 focus:outline-cyan-600 w-full max-w-xs" />

    <div
        class="w-[35rem] h-[27rem] rounded-md border-cyan-600 border transition-shadow shadow-md shadow-cyan-600 overflow-y-auto">
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
                        <div class="w-[32rem]">
                            <div class="flex items-center justify-between mt-2 ml-2">
                                <div class="avatar items-center hover:cursor-pointer">
                                    <div class="w-12 rounded-full">
                                        {{-- {{ $user }} --}}
                                        <img src="{{ $user['userImage'] }}" />
                                    </div>
                                    <span class="mx-2 text-xl w-[26rem] truncate">
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
