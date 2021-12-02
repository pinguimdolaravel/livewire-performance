<div
    x-data="Components.listBox({
            value: @entangle($attributes->wire('model')),
            wireModel: '{{ $attributes->get("wire:model") ?: $attributes->get("wire:model.defer") }}',
            modelName: 'selected', open: false, selectedIndex: 0, activeIndex: 0,
            items: {{ $jsonOptions }}
        })"
    x-init="init($wire)"
>
    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">
        {{ $label }}
    </label>
    <div class="mt-1 relative">
        <button type="button"
                class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox"
                :aria-expanded="open" aria-labelledby="listbox-label">
            <span x-text="selected.name" class="block truncate">Select an option</span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-icon selector class="h-5 w-5 text-gray-400"/>
            </span>
        </button>

        <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            x-max="1" @click.away="open = false" x-description="Select popover, show/hide based on select state."
            @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()"
            @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()"
            @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox"
            aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" style="display: none;">

            @foreach($options as $index => $option)
                <li class="text-gray-900 cursor-default select-none relative py-2 pl-8 pr-4"
                    id="listbox-option-{{ $index }}" role="option" @click="choose({{ $index }})"
                    @mouseenter="activeIndex = {{ $index }}"
                    @mouseleave="activeIndex = null"
                    :class="{ 'text-white bg-sky-600': activeIndex === {{ $index }}, 'text-gray-900': !(activeIndex === {{ $index }}) }">

                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal block truncate"
                          :class="{ 'font-semibold': selectedIndex === {{ $index }}, 'font-normal': !(selectedIndex === {{ $index }}) }">
                        {{ $option->name }}
                    </span>

                    <span class="text-sky-600 absolute inset-y-0 left-0 flex items-center pl-1.5"
                          :class="{ 'text-white': activeIndex === {{ $index }}, 'text-sky-600': !(activeIndex === {{ $index }}) }"
                          x-show="selectedIndex === {{ $index }}" style="display: none;">
                        <x-icon check class="h-5 w-5"/>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <x-input.error :for="$name" :message="$errorMessage"/>
</div>
