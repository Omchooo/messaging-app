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

    @if (session()->has('status'))
        <div class="alert alert-success shadow-lg max-w-2xl mb-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        </div>
    @endif

    <header>
        <h2 class="text-lg font-medium">
            Edit Profile
        </h2>

        <p class="mt-1 text-sm">
            Edit your account's profile by your preferences.
        </p>

    </header>

    <button class="btn mt-2" wire:loading wire:target="image">Uploading...</button>

    @if ($user->getFirstMedia('profile')->img('avatar'))
        <div class="mt-4">
            Photo:
            <div class="avatar w-full mt-2">
                <div class="w-24 rounded-full">
                    {{ $user->getFirstMedia('profile')->img('avatar') }}
                    {{-- <img src="{{ $user->getFirstMediaUrl('profile', 'avatar') }}" /> --}}
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

<div class="w-11/12 bg-base-200 p-4">
    @error('bio')
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

    @if (session()->has('statusBio'))
        <div class="alert alert-{{ $success ? 'success' : 'info' }} shadow-lg max-w-2xl mb-3">
            <div>
                @if ($success)
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif

                <span>{{ session('statusBio') }}</span>
            </div>
        </div>
    @endif

    <header>
        {{-- <h2 class="text-lg font-medium">
            Edit Profile
        </h2> --}}

        <p class="mt-1 text-sm">
            Edit your profile description.
        </p>

    </header>

    <form wire:submit.prevent='updateBio' class="mt-4 space-y-6">

        {{-- Profile picture --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">Profile description</span>
            </label>
            <figure class="my-2 w-full max-w-xs">
                <div class="flex flex-col mx-1">
                    <textarea class="textarea textarea-bordered" id="bio" name="bio" wire:model.lazy='bio'
                        placeholder="Current description: {{ $user->bio }}"></textarea>
                </div>

                {{-- <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" /> --}}
            </figure>
        </div>


        <button class="btn btn-outline btn-sm" type="submit">Save</button>
    </form>


</div>

<div class="w-11/12 bg-base-200 p-4">
    {{-- Theme picker --}}
    <div class="form-control w-full max-w-xs mt-4">
        <label class="label pt-0">
            <span class="label-text">Select theme:
                @if ($theme == 'valentine')
                    <span class="badge badge-sm">LIMITED TIME</span>
                @endif
            </span>
        </label>


        <select class="select select-bordered w-full max-w-xs" wire:model='theme' onchange="saveToLocalStorage(event)">
            <option value="auto">Same as Browser</option>
            <option value="light">Light</option>
            <option value="dark">Dark</option>
            <option value="night">Night</option>
            <option value="cupcake">Cupcake</option>
            <option value="valentine">Valentine
            </option>
        </select>
        {{-- <span>{{ $theme }}</span> --}}
        <script>
            function saveToLocalStorage(event) {
                const theme = event.target.value;
                localStorage.setItem('theme', theme);
                window.location.reload();
            }

            document.addEventListener('livewire:load', function() {
                // Set the value of the "theme" property
                @this.theme = localStorage.getItem('theme')
            })
        </script>
        {{-- </div> --}}
    </div>

</div>
