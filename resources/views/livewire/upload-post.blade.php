<div class="card max-w-md w-full md:w-144 shadow my-4 rounded p-4">
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"">
        @csrf
        <div class="mb-4">
            {{-- @error('image')
                <div class="alert alert-error shadow-lg mb-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                </div>
            @enderror --}}


            <label
                class="flex items-center justify-center h-full bg-gray-100 w-full min-h-[200px] hover:cursor-pointer hover:bg-gray-200 rounded border border-dashed border-gray-400">
                <input type="file" name="image" id="image" wire:model="image" class="hidden">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image" class="w-72 rounded" />
                    {{-- <label for="image" class=""></label> --}}
                @else
                    <p>Upload your image</p>
                    {{-- <label for="image">Add photo</label> --}}
                @endif
            </label>

            {{-- <div class="flex items-center justify-center w-full">
                @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"/>
                @endif
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if (!$image)
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        @endif
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" wire:model="image" class="hidden" />
                </label>
            </div> --}}




            {{-- <figure class="pt-2 max-w-xl min-h-[20rem]"> --}}
            {{-- <input type="file" name="image" id="image" class="file-input file-input-ghost w-full max-w-xs absolute self-center" /> --}}
            {{-- <img src="https://placeimg.com/400/600/arch" alt="Shoes" class="aspect-9/16" /> --}}
            {{-- </figure> --}}
        </div>
        <div class="flex flex-col">
            <textarea class="textarea textarea-bordered rounded" id="desc" name="desc" placeholder="Description">{{ old('desc') }}</textarea>
        </div>
        {{-- <div class="divider my-1"></div> --}}
        <div class="flex justify-end">
            {{-- @if ($image) --}}
            {{-- <label for="image" type="submit" class="btn btn-sm btn-active btn-outline px-8 h-6">
                    Change image
                </label> --}}
            {{-- @endif --}}
            <button type="submit" class="btn btn-sm btn-active btn-outline px-8 h-9 mt-4">Post</button>
        </div>
    </form>
</div>
