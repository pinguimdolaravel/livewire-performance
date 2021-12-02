@props([
    'header' => null,
    'divided' => null,
    'headerAction' => null,
    'warning' => null
])

@php
    $attributes = $attributes->class([
        'bg-white overflow-hidden sm:rounded-lg sm:shadow',
        'divide-y divide-gray-200' => $divided
    ]);
@endphp

<div {{ $attributes }} >
    <div class="px-4 sm:px-6 flex justify-between items-center">
        @if($header)
            <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center space-x-2 py-5">
                {{ $header }}
            </h3>
        @endif

        @if($headerAction)
            {{ $headerAction }}
        @endif
    </div>

    {{ $slot }}
</div>
