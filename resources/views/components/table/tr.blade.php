@props(['loop' => null])

<tr
    {{
        $attributes->class([
            'hover:bg-gray-100',
            'bg-gray-50' => $loop && $loop->even,
        ])
    }}
>
    {{ $slot }}
</tr>
