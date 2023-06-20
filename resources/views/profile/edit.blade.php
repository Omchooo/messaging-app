@extends('layouts.main')

@section('title', 'Settings • InstaByte')

@section('content')
    {{-- <div class="container mx-auto max-w-5xl max-h-[32rem] md:max-h-[48rem] flex justify-center pb-16 h-full"> --}}
        <livewire:drawer :user="$user">
    {{-- </div> --}}
@endsection
