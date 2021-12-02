@props(['filters', 'columns'])

@php
    $operators = ['=', '!=', '<', '>', '<=', '>=', '────' , 'Contains', 'Not Contains', '────', 'Is Null', 'Is Not Null'];
@endphp

<div x-data="{open: @entangle('sf') }" class="space-y-2">
    <div class="flex justify-between space-x-4 items-center">
		@if(count($columns))
			<x-button xs secondary gray @click="open = !open" icon="filter" class="capitalize tracking-wide">
				Filter
			</x-button>
		@endif

		<x-input.text name="search" class="py-1 text-xs" labeless placeholder="Search" wire:model.debounce="search" />

        @if(count($columns))
			<x-button xs secondary red icon="trash" wire:click="clearFilter" class="capitalize tracking-wide" x-show="open">
				Clear
			</x-button>
		@endif
    </div>

    @if(count($columns))
		<x-card x-show="open">

			<div class="px-4 py-2 space-y-1">
				@foreach($filters as $index => $filter)
					<div class="flex items-center space-x-1">
						<x-input.checkbox wire:model="filters.{{ $index }}.checkbox"/>

						<select wire:model="filters.{{ $index }}.column"
								class="rounded-md text-xs w-1/5 border-gray-200 focus:ring-sky-500 focus:border-sky-500">
							<option value="" disabled></option>
							@foreach($columns as $column => $label)
								<option value="{{ $column }}|{{ $label['input'] }}">{{ $label['label'] }}</option>
							@endforeach
						</select>

						<select wire:model="filters.{{ $index }}.operator"
								class="rounded-md text-xs border-gray-200 focus:ring-sky-500 focus:border-sky-500">
							@foreach($operators as $operator)
								<option value="{{ $operator }}" @if($operator == '────') disabled @endif>
									{{ $operator }}
								</option>
							@endforeach
						</select>

						@php
							$tmp = collect(explode('|', $filters[$index]['column']));
							$selectedColumn = $tmp->first();
						@endphp

						@if(isset($columns[$selectedColumn]['input']) && $columns[$selectedColumn]['input'] == 'select')
							<select wire:model="filters.{{ $index }}.value"
									class="rounded-md text-xs border-gray-200 w-full focus:ring-sky-500 focus:border-sky-500">
								<option value=""></option>
								@foreach($columns[$selectedColumn]['options'] as $item)
									@if($item instanceof \Illuminate\Database\Eloquent\Model)
										<option value="{{ $item->id }}">{{ $item->name }}</option>
									@else
										<option value="{{ $item }}">{{ $item }}</option>
									@endif
								@endforeach
							</select>
						@else
							<input
								type="{{ isset($columns[$selectedColumn]['input']) ? $columns[$selectedColumn]['input'] : 'text' }}"
								wire:model="filters.{{ $index }}.value"
								@if(collect(['Is Null', 'Is Not Null'])->contains($filters[$index]['operator'])) disabled
								@endif
								class="w-full text-xs rounded-md border-gray-200 focus:ring-sky-500 focus:border-sky-500"
							/>
						@endif

						<x-button xs secondary gray :disabled="count($filters) == 1" wire:click="delFilter({{ $index }})">
							-
						</x-button>

						<x-button wire:click="addFilter" xs secondary gray>
							+
						</x-button>
					</div>
				@endforeach
			</div>
		</x-card>
	@endif

</div>
