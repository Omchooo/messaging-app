@extends('layouts.main')

@push('styles')
    <style type="text/css">
        #users>li {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto my-5 flex justify-center">
        <div class="flex-row card bg-base-200 rounded-none h-[48rem]">
            <div class="w-80 my-4 ml-4 overflow-y-auto">
                <livewire:online-chat-users>
            </div>
            <div class="divider divider-horizontal mx-0"></div>

            {{-- livewire chat --}}
            <livewire:chat>
        </div>
    </div>


@endsection
