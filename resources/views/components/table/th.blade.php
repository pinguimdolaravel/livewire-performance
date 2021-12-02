@props([
    'orderBy' => null,
    'orderDirection' => 'asc',
    'currentOrder' => null
])

<th scope="col"
    @if($orderBy) wire:click="reorder('{{ $orderBy }}')" @endif
    {{ $attributes->class([
	    'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap',
	    'cursor-pointer' => $orderBy
	    ]) }}>

    <div class="flex">
        {{ $slot }}

        @if ($orderBy && $currentOrder == $orderBy)
            @if ($orderDirection == 'asc')
                <x-icon chevron-up class="h-4 w-4 ml-2"/>
            @else
                <x-icon chevron-down class="h-4 w-4 ml-2"/>
            @endif
        @endif
    </div>
</th>
