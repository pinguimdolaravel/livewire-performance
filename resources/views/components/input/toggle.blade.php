@props(['title', 'description', 'state' => false])

@php
    $id = Str::random();
@endphp

<div x-data="{ on: {{ $state ? 'true' : 'false' }} }">
    <input type="checkbox" {{ $attributes }} class="hidden" @change="$dispatch('input', $event.target.value)"
           id="{{ $id }}">
    <label for="{{ $id }}"
           class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-800 bg-gray-200"
           aria-pressed="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled"
           :class="{ 'bg-sky-800': on, 'bg-gray-200': !(on) }" aria-labelledby="availability-label"
           :aria-pressed="on.toString()" @click="on = !on">
        <span class="sr-only">Use setting</span>
        <span aria-hidden="true"
              class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0"
              x-state:on="Enabled" x-state:off="Not Enabled"
              :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
    </label>
</div>
