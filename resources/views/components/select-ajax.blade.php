@props([
    'route',
    'name',
    'withInfinityScroll' => true,
    'initialValue' => null,
    'withSearch' => false,
	'label' => null
])

@php
    $label = $label ?: Str::title(Str::snake($name));
    $wireModel = $attributes->get('wire:model') ?: $attributes->get('wire:model.defer');
@endphp

<div x-data="Components.listBoxAjax({
            search: null,
            initialValue: '{{ $initialValue }}',
            value: @entangle($attributes->wire('model')),
            wireModel: '{{ $wireModel }}',
            open: false,
            withInfinityScroll: '{{ $withInfinityScroll ? 1 : 0 }}',
            name: '{{ $name }}',
            route: '{{ $route }}',
            withSearch: '{{ $withSearch ? 1 : 0 }}'
        })" x-init="init(@this)">

    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">
        {{ $label }}
    </label>

    <div class="mt-1 relative">
        <button type="button" @click="openList()" @keydown.arrow-down.stop.prevent="openList()"
                @keydown.arrow-up.stop.prevent="openList()" @keydown.space.stop.prevent="openList()"
                class="
                    relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2
                    text-left cursor-default focus:outline-none focus:ring-1 focus:ring-sky-500
                    focus:border-sky-500 sm:text-sm
                " x-ref="button" :aria-expanded="open" aria-labelledby="listbox-label">

            <span x-text="selected.name" class="block truncate">{{ $initialValue ?: 'Select an option' }}</span>

            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <template x-if="loading">
                    <x-icon loading class="animate-spin h-5 w-5 text-gray-400"/>
                </template>
                <template x-if="!loading">
                    <x-icon selector class="h-5 w-5 text-gray-400"/>
                </template>
            </span>
        </button>

        <div
            x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @keydown.escape="onEscape()"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 text-base focus:outline-none
            ring-1 ring-black ring-opacity-5 sm:text-sms h-60 max-h-60" tabindex="-1" @click.away="open = false"
            style="display: none;">

            @if($withSearch)
                <div class="cursor-default flex items-center relative shadow-sm">
                    <label :for="`search-${name}`">
                        <x-icon search-circle outline class="h-7 pl-2 text-gray-500 w-7"/>
                    </label>
                    <input :id="`search-${name}`" x-model="search" x-on:input.debounce="doSearch()" type="text"
                           @keydown.tab.stop.prevent="listBoxFocus()" @keydown.arrow-down.stop.prevent="listBoxFocus()"
                           class="border-0 focus:ring-0 w-full" x-ref="search"
                           placeholder="Search ...">
                </div>
            @endif

            <ul
                class="overflow-auto  {{ $withSearch ? 'h-5/6' : 'h-full' }} focus:outline-none"
                x-max="1" x-ref="ul" role="listbox"
                @scroll="infinityScroll()"
                @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()"
                aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant">

                <template x-for="(item, index) in items" :key="item.id">
                    <li class="text-gray-900 cursor-default select-none relative py-2 pl-8 pr-4" role="option"
                        @click="choose(index)"
                        @mouseenter="activeIndex = index"
                        @mouseleave="activeIndex = null"
                        :id='`${name}::${item.id}}`' :class="{
                            'text-white bg-sky-600': activeIndex === index || selectedItem.id == item.id,
                            'text-gray-900': !(activeIndex === index || selectedItem.id == item.id)
                    }">
                        <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal block truncate"
                              :class="{ 'font-semibold': selectedIndex === index, 'font-normal': !(selectedIndex === index) }"
                              x-text="item.name">
                        </span>

                        <span class="text-sky-600 absolute inset-y-0 left-0 flex items-center pl-1.5"
                              :class="{
                                    'text-white': activeIndex === index || selectedItem.id == item.id,
                                    'text-sky-600': !(activeIndex === index || selectedItem.id == item.id)
                              }"
                              x-show="selectedIndex === index" style="display: none;">
                            <x-icon check class="h-5 w-5"/>
                        </span>
                    </li>
                </template>
            </ul>
        </div>


    </div>
</div>
