@props(['title'])

<span {{ $attributes }} x-data="" x-init="tippy($el)" data-tippy-content="{{ $title }}">
    {{ $slot }}
</span>
