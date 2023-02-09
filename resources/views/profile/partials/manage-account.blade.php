<div class="w-11/12 bg-base-200 p-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account's profile information.
        </p>

    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- username --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">Full Name</span>
            </label>
            <input type="text" name="full_name" value="{{ old('name', $user->full_name) }}"
                {{-- value="old('name', $user->name)" --}} class="input input-bordered w-full max-w-xs bg-base-100" />
        </div>

        {{-- email --}}
        <div class="form-control w-full max-w-xs mt-3">
            <label class="label pt-0">
                <span class="label-text">Email</span>
            </label>
            <input type="text" name="email" value="{{ old('email', $user->email) }}" {{--  value="old('email', $user->email)" --}}
                class="input input-bordered w-full max-w-xs bg-base-100" />
        </div>

        <button class="btn btn-outline btn-sm" type="submit">Save</button>

    </form>
</div>

{{-- password reset --}}
<div class="w-11/12 bg-base-200 p-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- current password --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">Current Password</span>
            </label>
            <input type="password" name="current_password"
                class="input input-bordered w-full max-w-xs bg-base-100" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword" class="mt-2" />
        </div>

        {{-- new password --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">New Password</span>
            </label>
            <input type="password" name="password" class="input input-bordered w-full max-w-xs bg-base-100"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword" class="mt-2" />
        </div>

        {{-- confirm password --}}
        <div class="form-control w-full max-w-xs mt-4">
            <label class="label pt-0">
                <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" name="password_confirmation"
                class="input input-bordered w-full max-w-xs bg-base-100" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-outline btn-sm" type="submit">Save</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
            @endif
        </div>

    </form>
</div>
