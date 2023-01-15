@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-2xl my-5 flex flex-col items-center">
        <a href="{{ route('posts.create') }}" class="btn btn-circle btn-outline bg-base-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </a>
        <a href="{{ route('posts.index') }}" class="btn btn-circle btn-outline bg-base-200">Posts</a>
        <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
            <div class="flex items-center justify-between mt-2 mx-2">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                    <span class="mx-2">username</span>
                </div>
                <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
            </div>
            <figure class="pt-2 max-w-xl">
                <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" />
            </figure>
            <div class="flex flex-col mx-3">
                <div class="flex my-2">
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" viewBox="0 0 24 24" fill="#8e8e8e" color="#8e8e8e">
                            <path
                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                            </path>
                        </svg>
                    </div>
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
                <span>2,179 likes</span>
                <label for="my-modal" class=" hover:cursor-pointer">view all 494 comments</label>
                <span class="text-xs my-1">6 hours ago</span>
            </div>
            <div class="divider my-1"></div>
            <div class="flex items-center justify-between px-3 my-2 gap-1">
                <input type="text" placeholder="Add a comment..." class="input input-ghost w-full max-w-xs" />
                <div class="btn btn-circle btn-sm btn-link">
                    <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
                        viewBox="0 0 24 24" width="24">
                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22"
                            x2="9.218" y1="3" y2="10.083"></line>
                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                    </svg>
                </div>
            </div>
        </div>

        <div class="card w-144 bg-base-200 shadow-2xl my-4 border border-gray-600">
            <div class="flex items-center justify-between mt-2 mx-2">
                <div class="avatar items-center">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                    <span class="mx-2">username</span>
                </div>
                <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
            </div>
            <figure class="pt-2 max-w-xl">
                <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" />
            </figure>
            <div class="flex flex-col mx-3">
                <div class="flex my-2">
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" viewBox="0 0 24 24" fill="#8e8e8e" color="#8e8e8e">
                            <path
                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                            </path>
                        </svg>
                    </div>
                    <div class="btn btn-circle btn-sm btn-link">
                        <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
                <span>2,179 likes</span>
                <label for="my-modal" class=" hover:cursor-pointer">view all 494 comments</label>
                <span class="text-xs my-1">6 hours ago</span>
            </div>
            <div class="divider my-1"></div>
            <div class="flex items-center justify-between px-3 my-2 gap-1">
                <input type="text" placeholder="Add a comment..." class="input input-ghost w-full max-w-xs" />
                <div class="btn btn-circle btn-sm btn-link">
                    <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24" role="img"
                        viewBox="0 0 24 24" width="24">
                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22"
                            x2="9.218" y1="3" y2="10.083"></line>
                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- comments modal --}}
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="relative">
            <div class=" absolute -right-20 top-2">
                <label for="my-modal" class="btn btn-square text-xl">X</label>
            </div>
            <div class="flex-row card bg-base-200 rounded-none">
                <figure>
                    <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-1/1 w-[48rem]" />
                </figure>
                <div class="w-[38rem] flex flex-col">
                    <div class="flex items-center justify-between mt-2 mx-2">
                        <div class="avatar items-center">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                            <span class="mx-2">username</span>
                        </div>
                        <div class="btn btn-info btn-xs btn-outline text-xs">follow</div> {{-- btn-neutral if following --}}
                    </div>
                    <div class="divider my-0"></div>
                    <div class="mx-3 my-2 flex flex-col gap-6 h-[31rem] overflow-y-auto">
                        <div class="avatar items-center">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/192/192/people" />
                            </div>
                            <span class="mx-2 truncate max-w-[7.5rem]">username - </span>
                            <span class="break-all max-w-[24rem]">desc desc desc desc desc desc desc desc desc desc
                                desc desc desc desc desc desc desc desc desc desc desc </span>
                        </div>

                        {{-- comment with replies --}}
                        <div class="flex flex-col gap-4">
                            {{-- comment by user --}}
                            <div class="flex justify-between items-center">
                                <div class="avatar items-center">
                                    <div class="w-10 rounded-full">
                                        <img src="https://placeimg.com/192/192/people" />
                                    </div>
                                    <span class="mx-2">username - </span>
                                    <span class="break-all w-[24rem]">comment </span>
                                </div>
                                <div
                                    class="btn btn-circle btn-sm btn-link flex justify-center items-center float-right mr-1">
                                    <svg height="12px" width="12px" viewBox="0 0 24 24" fill="#8e8e8e"
                                        color="#8e8e8e">{{-- ako je lajkano: #ed4956 --}}
                                        <path
                                            d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                            {{-- load more replies --}}
                            <button class="btn btn-xs {{-- loading --}} ml-14 w-32">View replies</button>
                            {{-- replies --}}
                            <div class="avatar items-center ml-14">
                                <div class="w-10 rounded-full">
                                    <img src="https://placeimg.com/192/192/people" />
                                </div>
                                <span class="mx-2">username - </span>
                                <span class="break-all w-[22rem]">reply</span>
                                <div>
                                    <div
                                        class="btn btn-circle btn-sm btn-link flex justify-center items-center float-right mr-1">
                                        <svg height="12px" width="12px" viewBox="0 0 24 24" fill="#8e8e8e"
                                            color="#8e8e8e">{{-- ako je lajkano: #ed4956 --}}
                                            <path
                                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider my-0"></div>

                    <div class="flex flex-col mx-3">
                        <div class="flex my-2">
                            <div class="btn btn-circle btn-sm btn-link">
                                <svg height="24px" width="24px" viewBox="0 0 24 24" fill="#8e8e8e" color="#8e8e8e">
                                    <path
                                        d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="btn btn-circle btn-sm btn-link">
                                <svg height="24px" width="24px" fill="#8e8e8e" color="#8e8e8e" viewBox="0 0 24 24">
                                    <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                        <span>2,179 likes</span>
                        <span class="text-xs my-1">6 hours ago</span>
                        <div class="divider my-0"></div>
                        <div class="flex items-center justify-between px-3 my-2 gap-1">
                            <input type="text" placeholder="Add a comment..." class="input input-ghost w-full" />
                            <div class="btn btn-circle btn-sm btn-link">
                                <svg aria-label="Share Post" color="#8e8e8e" fill="#8e8e8e" height="24"
                                    role="img" viewBox="0 0 24 24" width="24">
                                    <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        x1="22" x2="9.218" y1="3" y2="10.083"></line>
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

    </div>
@endsection
