@props([
    'warning' => null,
    'success' => null,
    'danger' => null
])

@php
    $attributes = $attributes->class([
        'py-4 px-4 lg:px-6 w-full text-sm tracking-wide',
        'bg-green-50 text-green-700' => $success,
        'bg-yellow-50 text-yellow-700' => $warning,
        'bg-red-50 text-red-700' => $danger,
        'bg-sky-50 text-sky-700' => !$danger && !$success && !$warning
    ]);
@endphp
<div {{ $attributes }} >
    {{ $slot }}
</div>
