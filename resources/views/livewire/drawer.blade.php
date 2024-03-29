<div class="drawer drawer-mobile rounded h-full max-w-5xl container">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center space-y-10 py-10 overflow-y-auto h-full ">
        <!-- Page content here -->
        @includeWhen($toggleTab == 1, 'profile.partials.edit-profile', ['user' => $user])
        @includeWhen($toggleTab == 2, 'profile.partials.manage-followers', ['user' => $user])
        @includeWhen($toggleTab == 3, 'profile.partials.manage-account', ['user' => $user])
        @includeWhen($toggleTab == 4, 'profile.partials.bug-report')
    </div>
    <div class="drawer-side h-full">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="p-4 w-80 bg-base-200 text-base-content flex flex-col justify-between">
            <!-- Sidebar content here -->
            <div class="gap-1 flex flex-col">
                <li class="btn btn-ghost btn-outline btn-block no-animation rounded {{ $toggleTab == 1 ? 'btn-active' : '' }}"
                    wire:click='changeTab(1)'><a>Edit Profile</a></li>
                <li class="btn btn-ghost btn-outline btn-block no-animation rounded {{ $toggleTab == 2 ? 'btn-active' : '' }}"
                    wire:click='changeTab(2)'><a>Manage Followers</a></li>
                <li class="btn btn-ghost btn-outline btn-block no-animation rounded {{ $toggleTab == 3 ? 'btn-active' : '' }}"
                    wire:click='changeTab(3)'><a>Manage Account</a></li>
            </div>
            <li class="btn btn-error btn-outline btn-block no-animation rounded btn-active" wire:click='changeTab(4)'>
                <a>Found Bugs?</a></li>
        </ul>

    </div>
</div>
