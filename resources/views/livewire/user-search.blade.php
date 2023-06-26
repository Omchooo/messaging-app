@section('title', 'Search • InstaByte')

<div class="max-w-4xl w-full flex flex-col items-center gap-8 pb-20 px-2">
    <div class="flex flex-col items-center max-w-md flex-wrap">
        <h2 class="text-lg font-medium max-w-fit">
            Having trouble finding the user you're looking for?
        </h2>
        <p class="mt-1 text-sm max-w-fit">
            Search down below, someone will surely pop up!
        </p>
    </div>

    <input type="text" placeholder="Search here..." wire:model.debounce.300ms='searchInput'
        class="input input-bordered input-accent border-cyan-600 outline-cyan-600 focus:outline-cyan-600 w-full max-w-xs" />

    {{-- original --}}
    @if (empty($users) && !empty($searchInput))
        <div class="flex w-full justify-center my-4">
            <h2>Sorry, there are no users found</h2>
        </div>
    @else
        @if (empty($users) && empty($searchInput))
            <div class="flex w-full justify-center my-4">
                <p class="text-sm text-gray-400">Fresh results are served here</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($users as $user)
                    <div class="card w-full min-w-[17rem] max-w-[17rem] bg-base-100 shadow rounded p-4 gap-5 flex-1">
                        <a href="{{ route('viewprofile.index', $user['username']) }}" class="avatar justify-center">
                            <div class="w-20 md:w-28 mask mask-squircle">
                                <img src="{{ $user['userImage'] }}" alt="User" />
                            </div>
                        </a>
                        <div class="card-body flex-grow-0 image-full items-center p-0 gap-4">
                            <a href="{{ route('viewprofile.index', $user['username']) }}">
                                <h2 class="card-title max-w-[15rem] truncate">
                                    {{ $user['fullName'] ?? '' }}
                                </h2>
                            </a>
                            <a href="{{ route('viewprofile.index', $user['username']) }}">
                                <p class="max-w-[15rem] truncate">{{ '@' . $user['username'] }}</p>
                            </a>
                            <p class="max-w-[15rem] truncate text-gray-400 text-center">
                                {{ $user['desc'] ?? 'No description available' }}
                            </p>

                        </div>
                    </div>
                @endforeach
        @endif
    @endif


</div>

{{-- <div
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
                                       
                                        <img src="{{ $user['userImage'] }}" />
                                    </div>
                                    <span class="mx-2 text-lg md:text-xl max-w-md w-full truncate">
                                        {{ '@' . $user['username'] }}
                                        {{ $user['fullName'] ? ' | ' . $user['fullName'] : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="divider my-1"></div>
                @endforeach
            @endif
        @endif
    </div> --}}



</div>
