<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="space-y-4 lg:space-y-4">
            <x-h1>Users</x-h1>

           <x-input.text name="search" labeless placeholder="Search ..." />

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
                                        <x-button xs>
                                            Edit
                                        </x-button>

                                        <x-button xs red>
                                            Delete
                                        </x-button>
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
        </div>
    </x-container>

</x-app-layout>
