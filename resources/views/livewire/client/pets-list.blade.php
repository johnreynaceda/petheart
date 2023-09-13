<div class="relative">
    <div class="mb-3 relative">
        <x-button label="New Pets" rounded class="font-semibold uppercase px-6" icon="plus-circle"
            wire:click="$set('add_modal', true)" dark />
    </div>
    <div class="relative">
        {{ $this->table }}
    </div>
    <x-modal wire:model.defer="add_modal" align="center" max-width="4xl">
        <x-card title="NEW PETS">
            <div class="p-5">
                {{ $this->form }}
            </div>

            <x-slot name="footer">
                <div class="flex justify-start gap-x-4">
                    <x-button positive label="Submit" rounded class="font-semibold px-4" wire:click="submitRecord"
                        spinner="submitRecord" />
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
