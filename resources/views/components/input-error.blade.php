@props(['messages'])


@if ($messages->any())
    @foreach ((array) $messages->all() as $message)
        <pre data-prefix=">" class="text-error"><code>{{ $message }}</code></pre>
    @endforeach
@endif

{{-- @if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif --}}
