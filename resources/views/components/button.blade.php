@props([
    'xs' => null,
    'sm' => null,
    'lg' => null,
    'xl' => null,
    'white' => null,
    'green' => null,
    'lightBlue' => null,
    'red' => null,
    'yellow' => null,
    'pink' => null,
    'purple' => null,
    'gray' => null,
    'blue' => null,
    'blueGray' => null,
    'rose' => null,
    'teal' => null,
    'outline' => null,
    'secondary' => null,
    'icon' => null,
    'iconRight' => null,
    'circle' => null
])
@php

    $size = 'md';
    if($xs) $size = 'xs';
    if($sm) $size = 'sm';
    if($lg) $size = 'lg';
    if($xl) $size = 'xl';

    $color = 'sky';
    if($red) $color = 'red';
    if($yellow) $color = 'yellow';
    if($pink) $color = 'pink';
    if($purple) $color = 'purple';
    if($gray) $color = 'gray';
    if($blue) $color = 'blue';
    if($blueGray) $color = 'blue-gray';
    if($rose) $color = 'rose';
    if($teal) $color = 'teal';
    if($white) $color = 'white';
    if($green) $color = 'green';

    $outline = is_null($outline) ? false : $outline;
    $secondary = is_null($secondary) ? false : $secondary;
    $circle = is_null($circle) ? false : $circle;
@endphp

<button
    {{ $attributes->class([
            ' items-center border border-transparent font-medium rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2',
            'inline-flex' => $icon ?? $iconRight,

            // Sizes
            'px-2.5 py-1.5 text-xs' => $size == 'xs',
            'px-3 py-2 text-sm leading-4' => $size == 'sm',
            'px-4 py-2 text-sm' => $size == 'md',
            'px-4 py-2 text-base' => $size == 'lg',
            'px-6 py-3 text-base' => $size == 'xl',

            // No Outline
            'bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-gray-700 border-gray-300' => !$secondary && !$outline && $color == 'white',
            'bg-sky-700 hover:bg-sky-800 focus:ring-sky-500 text-white' => !$secondary && !$outline && $color == 'sky',
            'bg-red-700 hover:bg-red-800 focus:ring-red-500 text-white' => !$secondary && !$outline && $color == 'red',
            'bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-500 text-white' => !$secondary && !$outline && $color == 'yellow',
            'bg-pink-700 hover:bg-pink-800 focus:ring-pink-500 text-white' => !$secondary && !$outline && $color == 'pink',
            'bg-purple-700 hover:bg-purple-800 focus:ring-purple-500 text-white' => !$secondary && !$outline && $color == 'purple',
            'bg-gray-700 hover:bg-gray-800 focus:ring-gray-500 text-white' => !$secondary && !$outline && $color == 'gray',
            'bg-blue-700 hover:bg-blue-800 focus:ring-blue-500 text-white' => !$secondary && !$outline && $color == 'blue',
            'bg-blue-gray-700 hover:bg-blue-gray-800 focus:ring-blue-gray-500 text-white' => !$secondary && !$outline && $color == 'blue-gray',
            'bg-rose-700 hover:bg-rose-800 focus:ring-rose-500 text-white' => !$secondary && !$outline && $color == 'rose',
            'bg-teal-700 hover:bg-teal-800 focus:ring-teal-500 text-white' => !$secondary && !$outline && $color == 'teal',
            'bg-green-700 hover:bg-green-800 focus:ring-green-500 text-white' => !$secondary && !$outline && $color == 'green',

            // Outline
            'border-sky-700 hover:bg-sky-700 hover:text-white focus:ring-sky-500 text-sky-700' => !$secondary && $outline && $color == 'sky',
            'border-red-700 hover:bg-red-700 hover:text-white focus:ring-red-500 text-red-700' => !$secondary && $outline && $color == 'red',
            'border-yellow-500 hover:bg-yellow-500 hover:text-white focus:ring-yellow-500 text-yellow-500' => !$secondary && $outline && $color == 'yellow',
            'border-pink-700 hover:bg-pink-700 hover:text-white focus:ring-pink-700 text-pink-700' => !$secondary && $outline && $color == 'pink',
            'border-purple-700 hover:bg-purple-700 hover:text-white focus:ring-purple-700 text-purple-700' => !$secondary && $outline && $color == 'purple',
            'border-gray-700 hover:bg-gray-700 hover:text-white focus:ring-gray-500 text-gray-700' => !$secondary && $outline && $color == 'gray',
            'border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-blue-500 text-blue-700' => !$secondary && $outline && $color == 'blue',
            'border-blue-gray-700 hover:bg-blue-gray-800 hover:text-white focus:ring-blue-gray-500 text-blue-gray-700' => !$secondary && $outline && $color == 'blue-gray',
            'border-rose-700 hover:bg-rose-800 hover:text-white focus:ring-rose-500 text-rose-700' => !$secondary && $outline && $color == 'rose',
            'border-teal-700 hover:bg-teal-800 hover:text-white focus:ring-teal-500 text-teal-700' => !$secondary && $outline && $color == 'teal',
            'border-green-700 hover:bg-green-800 hover:text-white focus:ring-green-500 text-green-700' => !$secondary && $outline && $color == 'green',

            // Secondary Buttons
            'bg-sky-100 hover:bg-sky-200 focus:ring-sky-500 text-sky-700' => $secondary && $color == 'sky',
            'bg-red-100 hover:bg-red-200 focus:ring-red-500 text-red-700' => $secondary && $color == 'red',
            'bg-yellow-100 hover:bg-yellow-200 focus:ring-yellow-500 text-yellow-500' => $secondary && $color == 'yellow',
            'bg-pink-100 hover:bg-pink-200 focus:ring-pink-700 text-pink-700' => $secondary && $color == 'pink',
            'bg-purple-100 hover:bg-purple-200 focus:ring-purple-700 text-purple-700' => $secondary && $color == 'purple',
            'bg-gray-100 hover:bg-gray-200 focus:ring-gray-500 text-gray-700' => $secondary && $color == 'gray',
            'bg-blue-100 hover:bg-blue-200 focus:ring-blue-500 text-blue-700' => $secondary && $color == 'blue',
            'bg-blue-gray-100 hover:bg-blue-gray-200 focus:ring-blue-gray-500 text-blue-gray-700' => $secondary && $color == 'blue-gray',
            'bg-rose-100 hover:bg-rose-200 focus:ring-rose-500 text-rose-700' => $secondary && $color == 'rose',
            'bg-teal-100 hover:bg-teal-200 focus:ring-teal-500 text-teal-700' => $secondary && $color == 'teal',
            'bg-green-100 hover:bg-green-200 focus:ring-green-500 text-green-700' => $secondary && $color == 'green',

            // Circle

            // Rounded
            'rounded-full' => $circle
    ]) }} >

    @if($icon)
        <x-icon :icon="$icon" :class="
            $size == 'xs' ? 'mr-2 -ml-0.5 h-4 w-4' :
            ($size == 'sm' ? 'mr-2 -ml-1 h-5 w-5' :
            ($size == 'md' ? 'mr-3 -ml-1 h-5 w-5' :
            ($size == 'lg' ? 'mr-3 -ml-1 h-5 w-5' :
            ($size == 'xl' ? 'mr-3 -ml-1 h-5 w-5' : ''))))
        "/>
    @endif
    {{ $slot }}
    @if($iconRight)
        <x-icon :icon="$iconRight" :class="
            $size == 'xs' ? 'ml-2 -mr-0.5 h-4 w-4' :
            ($size == 'sm' ? 'ml-2 -mr-1 h-5 w-5' :
            ($size == 'md' ? 'ml-3 -mr-1 h-5 w-5' :
            ($size == 'lg' ? 'ml-3 -mr-1 h-5 w-5' :
            ($size == 'xl' ? 'ml-3 -mr-1 h-5 w-5' : ''))))
        "/>
    @endif
</button>
