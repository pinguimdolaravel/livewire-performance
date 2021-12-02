<div>
    <x-button xs red wire:click="$set('modal', true)">
        Delete
    </x-button>

    @if ($modal)

        <x-modal>

            <x-card>

                <x-card.section>
                    Are you sure you want to delete this user: {{ $user->name }}?
                </x-card.section>

                <x-card.footer class="flex justify-between">
                    <x-button xs red wire:click="$set('modal', false)">
                        Cancel
                    </x-button>

                    <x-button xs green wire:click="destroy">
                        Yes
                    </x-button>
                </x-card.footer>
            </x-card>

        </x-modal>

    @endif
</div>
