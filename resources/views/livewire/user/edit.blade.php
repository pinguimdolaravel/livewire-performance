<div>
    <x-button xs wire:click="$set('modal', true)">
        Edit
    </x-button>

    @if ($modal)
        <x-modal xl>
            <x-card>
                <x-card.section class="space-y-4">
                    <x-input.text wire:model.defer="user.name" name="user.name" label="Name" />
                    <x-input.text wire:model.defer="user.email" name="user.email" label="Email" />
                </x-card.section>

                <x-card.footer class="flex justify-between">
                    <x-button xs outline gray wire:click="$set('modal', false)">
                        Close
                    </x-button>
                    <x-button xs outline green wire:click="save">
                        Save
                    </x-button>
                </x-card.footer>
            </x-card>

        </x-modal>
    @endif
</div>
