<div class="w-11/12 bg-base-200 p-4">
    @error('image')
        <div class="alert alert-error shadow-lg mb-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    @enderror

    @if ($message = session('status'))
        <div class="alert alert-success shadow-lg max-w-2xl mb-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Edit Profile
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Edit your account's profile by your preferences.
        </p>

    </header>

    <button class="btn loading" wire:loading wire:target="image">Uploading...</button>

    @if ($user->getFirstMediaUrl('profile', 'avatar'))
        <div class="mt-4">
            Photo:
            <div class="avatar w-full mt-2">
                <div class="w-24 rounded-full">
                    <img src="{{ $user->getFirstMediaUrl('profile', 'avatar') }}" />
                </div>
            </div>
        </div>
    @endif

    {{-- @if ($user->getFirstMediaUrl('profile'))
        <div class="mt-4">
            Photo:
            <div class="avatar w-full mt-2">
                <div class="w-24 rounded-full">
                    <img src="{{ $user->getFirstMediaUrl('profile') }}" />
                </div>
                @if ($image)
                    <div wire:defer class="w-24 rounded-full ml-4">
                        <img src="{{ $image->temporaryUrl() }}" />
                    </div>
                @endif
            </div>

        </div>
    @endif --}}

    <form wire:submit.prevent='uploadImage' class="mt-4 space-y-6">

        {{-- Profile picture --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">Profile picture</span>
            </label>
            <figure class="my-2 w-full max-w-xs">
                <input type="file" wire:model='image' class="file-input file-input-bordered w-full max-w-xs" />

                {{-- <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" /> --}}
            </figure>

        </div>


        <button class="btn btn-outline btn-sm" type="submit">Save</button>

    </form>

</div>
