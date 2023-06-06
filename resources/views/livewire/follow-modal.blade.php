<div class="flex justify-evenly my-1 text-md max-w-[90%] w-full truncate">
    <label class="hover:cursor-pointer" wire:click="showComponent(0)">{{ $followersCount }} followers</label>
    <label class="hover:cursor-pointer" wire:click="showComponent(1)">{{ $followingCount }} following</label>

    @if ($showComponent)
        <div class="flex fixed top-0 right-0 left-0 bottom-0 justify-center items-center z-40 bg-base-300 bg-opacity-80">
            <div class="relative">
                <div class="absolute -right-20 top-2 z-50">
                    <button class="btn btn-square btn-outline text-xl" wire:click='showComponent'>X</button>
                </div>
                {{-- <livewire:show-modal :followData="$followData"> --}}
                <div class="container mx-auto max-w-5xl flex flex-col items-center">
                    <div class="card w-96 bg-base-200 border border-gray-600 shadow-xl h-96">
                        <div class="card-body flex flex-col items-center overflow-y-auto p-0 gap-1 my-2">
                            @foreach ($followData as $user)
                                <div class="w-full max-w-[21rem]">
                                    <div class="flex flex-row items-center justify-between mt-2">
                                        <a href="{{ route('viewprofile.index', $user->username) }}">
                                            <div class="avatar items-center hover:cursor-pointer">
                                                <div class="w-10 rounded-full">
                                                    @if ($user->getFirstMediaUrl('profile', 'avatar'))
                                                        <img src="{{ $user->getFirstMediaUrl('profile', 'avatar') }}" />
                                                    @endif
                                                </div>
                                                <span
                                                    class="mx-2 text-md w-48 truncate">{{ $user->full_name ?? $user->username }}</span>
                                            </div>
                                        </a>
                                        @if (!(auth()->user()->id === $user->id)) {{-- nap da preko @can provjeravam --}}
                                            <livewire:follow :user="$user" :wire:key="uniqid()">
                                        @endif
                                    </div>
                                    <div class="divider my-0 max-y-[0.125rem]"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
