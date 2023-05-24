@extends('layouts.main')

@section('content')
    <livewire:show-modal :post="$post">


    {{-- <script>
        $("form").submit(function() {
            $.post($(this).attr("action"), $(this).serialize());
            return false;
        });
    </script> --}}
@endsection
