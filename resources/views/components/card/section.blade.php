@props(['footer' => null])

<div {{ $attributes->class(['px-4 sm:px-6 py-6', 'flex justify-end bg-gray-50 space-x-4' => $footer]) }}>
    {{ $slot }}
</div>
