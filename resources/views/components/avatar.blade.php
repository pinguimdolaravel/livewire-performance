@props([
    'for',
    'noTippy' => false,
    'title' => null
])

<img {{ $attributes->merge(['class' => 'h-8 w-8 rounded-full']) }}
     @if(!$noTippy) x-data="" x-init="tippy($el)" data-tippy-content="{{ $title ?: $for->name }}" @endif
     src="{{ $for->avatar }}" alt="{{ $for->name }}" />
