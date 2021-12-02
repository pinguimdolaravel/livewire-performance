<x-input x-data="" x-init='new Pikaday({ field: $refs.input {{ $jsonOptions() }} })'
         @change="$dispatch('input', $event.target.value)" class="flex flex-col w-full">

    @if(!$labeless)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1 relative">
        <input type="text" name="{{ $name }}" id="{{ $name }}" x-ref="input" autocomplete="off"
               {{
                $attributes
                    ->merge(['class' => 'shadow-sm block w-full sm:text-sm rounded'])
                    ->class([
                        'border-red-500 text-red-900 placeholder-red-500 focus:border-red-500 focus:shadow-outline-red' => $errors->has($name),
                        'border-gray-300 focus:ring-sky-500 focus:border-sky-500' => ! $errors->has($name),
                        'bg-gray-200' => $attributes->has('disabled') && $attributes->get('disabled')
                    ])
               }} value="{{ old( $name, $value) }}"
        />
    </div>

    <x-input.error :for="$name"/>
</x-input>
