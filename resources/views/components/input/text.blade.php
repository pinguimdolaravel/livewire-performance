@props([
    'name',
    'value' => null,
    'label' => null,
    'icon' => null,
    'type' => 'text',
    'labeless' => false,
    'errorMessage' => null
])

@php
    if(!$label instanceof \Illuminate\Support\HtmlString) {
        $label = __( $label ?? str_replace('_', ' ',  Str::title(Str::snake($name))) );
    }
@endphp

<x-input>
    @unless($labeless)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endunless
    <div class="{{ $labeless ? '' : 'mt-1' }} relative">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
               {{ $attributes->merge(['class' =>'shadow-sm block w-full sm:text-sm rounded'])->class([
               'border-red-500 text-red-900 placeholder-red-500 focus:border-red-500 focus:shadow-outline-red' => $errors->has($name),
               'border-gray-300 focus:ring-sky-500 focus:border-sky-500' => ! $errors->has($name),
               'bg-gray-100' => $attributes->has('disabled')
               ]) }}

               @if($value) value="{{ $value }}" @endif
        />
    </div>

    <x-input.error :for="$name" :message="$errorMessage"/>
</x-input>
