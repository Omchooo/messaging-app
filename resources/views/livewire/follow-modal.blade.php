<div class="flex justify-evenly my-1 text-md max-w-[90%] w-full truncate">
    <label class="hover:cursor-pointer" wire:click="showComponent(0)">{{ $followersCount }} followers</label>
    <label class="hover:cursor-pointer" wire:click="showComponent(1)">{{ $followingCount }} following</label>

    @if ($showComponent)
        <div
            class="flex fixed top-0 right-0 left-0 bottom-0 justify-center items-center z-40 bg-base-300 bg-opacity-80 px-2">

            {{-- <livewire:show-modal :followData="$followData"> --}}
            <div class="container mx-auto max-w-5xl flex flex-col items-center">
                <div class="card max-w-xs w-full md:max-w-none md:w-96 bg-base-200 shadow h-96 relative">
                    <div class="absolute right-2 top-2 z-50">
                        <button
                            class="btn btn-sm btn-square text-xl border-none text-current bg-transparent hover:bg-transparent"
                            wire:click='showComponent'>X</button>
                    </div>
                    <div class="card-body flex flex-col items-center overflow-y-auto p-0 gap-1 mt-8 mb-2">
                        @if ($followCount)
                            @foreach ($followData as $user)
                                <div class="w-full">
                                    <div class="flex flex-row items-center justify-between mt-2 mx-2">
                                        <a href="{{ route('viewprofile.index', $user->username) }}">
                                            <div class="avatar items-center hover:cursor-pointer">
                                                <div class="w-10 rounded-full">
                                                    @if ($user->getFirstMediaUrl('profile', 'avatar'))
                                                        <img src="{{ $user->getFirstMediaUrl('profile', 'avatar') }}" />
                                                    @endif
                                                </div>
                                                <span
                                                    class="mx-2 text-md w-full max-w-[12rem] truncate">{{ $user->full_name ?? $user->username }}</span>
                                            </div>
                                        </a>
                                        @if (!(auth()->user()->id === $user->id))
                                            {{-- nap da preko @can provjeravam --}}
                                            <livewire:follow :user="$user" :wire:key="uniqid()">
                                        @endif
                                    </div>
                                    <div class="divider my-0 max-y-[0.125rem]"></div>
                                </div>
                            @endforeach
                        @else
                            <p class="flex h-full items-center mb-6">No users found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
