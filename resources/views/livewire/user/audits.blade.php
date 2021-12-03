<div>
    <x-button outline xs gray wire:click="$set('modal', true)">
        Audit
    </x-button>

    @if ($modal)
        <x-modal max-width="4xl">
            <x-card>
                <x-table>
                    <x-table.head>
                        <x-table.tr>
                            <x-table.th class="w-full">Event</x-table.th>
                            <x-table.th>Column</x-table.th>
                            <x-table.th>Old Value</x-table.th>
                            <x-table.th>New Value</x-table.th>
							<x-table.th>When</x-table.th>
                        </x-table.tr>
                    </x-table.head>

                    <x-table.body>
                        @foreach ($audits as $item)
                            <x-table.tr :loop="$loop">
                                <x-table.td>{{ $item->event }}</x-table.td>
                                <x-table.td>{{ $item->column }}</x-table.td>
                                <x-table.td>{{ $item->old_value }}</x-table.td>
                                <x-table.td>{{ $item->new_value }}</x-table.td>
								<x-table.td>{{ $item->created_at->diffForHumans() }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.body>
                </x-table>

            </x-card>

        </x-modal>
    @endif
</div>
