<div>
    <div class="space-y-4 lg:space-y-4">
        <x-h1>Users</x-h1>

        <div class="flex items-center space-x-2 whitespace-nowrap">
            <x-input.text name="search" labeless placeholder="Search ..." wire:model="search" />
			<x-button wire:click="$set('search', '')">
				Clear Search
			</x-button>
        </div>

        <x-card>
            <x-table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th class="w-full">User</x-table.th>
                        <x-table.th>Email</x-table.th>
                        <x-table.th></x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @foreach ($users as $item)
                        <x-table.tr :loop="$loop">
                            <x-table.td class="flex items-center space-x-1">
                                <div>{{ $item->name }}</div>
                            </x-table.td>
                            <x-table.td>
                                {{ $item->email }}
                            </x-table.td>
                            <x-table.td>
                                <div class="flex space-x-2">
                                    <x-button outline xs gray>
                                        Audit
                                    </x-button>

									<livewire:user.edit :user="$item" :key="'edit-' . $item->id" />
									<livewire:user.delete :user="$item" :key="'delete-' . $item->id" />

                                </div>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.body>
            </x-table>

            <x-card.footer>
                {{ $users->links() }}
            </x-card.footer>
        </x-card>
    </div> {{-- Be like water. --}}
</div>
