@extends('layouts.main')

@section('title', 'Settings • InstaByte')

@section('content')
    <div class="container mx-auto max-w-5xl my-5 mt-0 flex justify-center">
        <livewire:drawer :user="$user">
    </div>
@endsection
