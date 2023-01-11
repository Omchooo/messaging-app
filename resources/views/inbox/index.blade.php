@extends('layouts.main')

@section('content')

<div class="container mx-auto  my-5 flex justify-center">
    <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
        <div class="w-80 my-4 ml-4 overflow-y-auto">
            {{-- contacts --}}
            <div class=" w-72">
                <div class="flex items-center justify-between mt-2">
                    <div class="avatar items-center">
                        <div class=" w-14 rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                        <span class="mx-2 text-xl w-56 truncate">usernameeeeeeeeeeeeeeeeeeeeeeeeeee</span>
                    </div>
                </div>
            </div>
            <div class="divider my-1"></div>


            {{-- end foreach here --}}
        </div>
        <div class="divider divider-horizontal mx-0"></div>
        <div class="w-[38rem] flex flex-col">
            <div class="flex items-center justify-between mt-2 mx-2">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                    <span class="mx-2">username</span>
                </div>
                <div>
                    <div class="btn btn-info btn-xs btn-outline text-xs">follow</div>
                </div>
            </div>
            <div class="divider my-0"></div>
            <div class="mx-3 my-2 flex flex-col gap-6 h-full overflow-y-auto">

            </div>
            <div class="divider my-0"></div>
            <div class="flex flex-col mx-3">
                <div class="flex items-center justify-between px-3 my-2 gap-1">
                    <input type="text" placeholder="Add a comment..." class="input input-ghost w-full" />
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg aria-label="Share Post" class="_ab6-" color="#8e8e8e" fill="#8e8e8e"
                            height="24" role="img" viewBox="0 0 24 24" width="24">
                            <line fill="none" stroke="currentColor" stroke-linejoin="round"
                                stroke-width="2" x1="22" x2="9.218" y1="3"
                                y2="10.083"></line>
                            <polygon fill="none"
                                points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
