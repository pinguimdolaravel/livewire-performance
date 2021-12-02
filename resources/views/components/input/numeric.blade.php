@props([
    'prefix' => null
])

<x-input.text
    {{ $attributes }}
    x-data="{}"
    x-init="
        new Cleave($el, {
            numeral: true,
            numeralDecimalScale: 2,
            prefix: '{{ $prefix ? $prefix . ' ' : '' }}'
        });
    "/>
