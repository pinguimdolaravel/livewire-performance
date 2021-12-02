@props(['for', 'message' => null])
@php
    $replace = $message;
@endphp

@error($for)
<p class="bg-red-500 inline ml-px mt-0.5 px-2 py-0.5 rounded text-white text-xs tracking-wide self-end">
    {{ $replace ?: $message }}
</p>
@enderror
