@props([
    'warning' => null
])

<div
    {{ $attributes->class([
        'px-5 py-2 border-t bg-gray-50 border-gray-200',
        'bg-yellow-50 border-yellow-50 text-yellow-700' => $warning
    ]) }}>
    {{ $slot }}
</div>
