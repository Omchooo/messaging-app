<div class="w-11/12 bg-base-200 p-4">

    <header>
        <h2 class="text-lg font-medium">
            Manage your followers
        </h2>

        <p class="mt-1 text-sm">
            View, message, unfollow or block user that you are following.
        </p>

    </header>

    {{-- <div class="form-control w-full mt-4">
        <label class="label pt-0 flex justify-center w-full">
            <span class="label-text text-5xl my-36 text-error">Coming soon</span>
        </label>
    </div> --}}

    <div class="w-full flex flex-col items-center gap-8">
        {{-- <div class="flex flex-col items-center max-w-md flex-wrap mt-10">
            <h2 class="text-lg font-medium max-w-fit">
                Too many users to scroll for?
            </h2>
            <p class="mt-1 text-sm max-w-fit">
                Don't worry, I got you!
            </p>
        </div> --}}
        <input type="text" placeholder="Search here..." wire:model.debounce.300ms='searchInput'
            class="input input-sm input-bordered input-accent border-cyan-500 outline-cyan-500 focus:outline-cyan-500 w-full max-w-xs mt-8" />
            <div class="flex">
                <button class="btn btn-xs animate-none rounded-r-none border-cyan-500 {{ $searchFor ? 'bg-transparent text-cyan-500 hover:bg-cyan-500 hover:text-base-200 hover:border-cyan-500' : 'bg-cyan-500 text-base-200 hover:bg-cyan-500 hover:text-base-200 hover:border-cyan-500' }}" wire:click='setSearchFor(0)'>followers</button>
                <button class="btn btn-xs animate-none rounded-l-none border-cyan-500  {{ $searchFor ? 'bg-cyan-500 text-base-200 hover:bg-cyan-500 hover:text-base-200 hover:border-cyan-500' : 'bg-transparent text-cyan-500 hover:bg-cyan-500 hover:text-base-200 hover:border-cyan-500' }}" wire:click='setSearchFor(1)'>following</button>
            </div>

            <div
        class="w-[35rem] h-[24rem] rounded-md border-cyan-500 border transition-shadow shadow-md shadow-cyan-500 overflow-y-auto">
        @if (empty($followUsers) && !empty($searchInput))
            <div class="flex w-full justify-center my-4">
                <h2>Sorry, there are no users found</h2>
            </div>
        @else
            @if (empty($followUsers) && empty($searchInput))
                <div class="flex w-full justify-center my-4">
                    <h2>All searched users will pop up here!</h2>
                </div>
            @else
                @foreach ($followUsers as $user)
                    <a href="{{ route('viewprofile.index', $user['username']) }}">
                        <div class="w-[32rem]">
                            <div class="flex items-center justify-between mt-2 ml-2">
                                <div class="avatar items-center hover:cursor-pointer">
                                    <div class="w-12 rounded-full">
                                        {{-- {{ $user }} --}}
                                        <img src="{{ $user['userImage'] }}" alt="image">
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

</div>
