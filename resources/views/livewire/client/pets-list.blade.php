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

    <x-modal wire:model.defer="edit_modal" align="center" max-width="4xl">
        <x-card title="EDIT PETS">
            <div class="p-5">
                <div class="grid grid-cols-2 gap-5">
                    <div class="">
                        @if ($pet_data)
                            <img src="{{ Storage::url($pet_data->photo_path) }}" class="rounded-xl" alt="">
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    {{ $this->form }}
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-start gap-x-4">
                    <x-button positive label="Update Record" rounded class="font-semibold px-4"
                        wire:click="updateRecord" spinner="updateRecord" />
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="pet_details" align="center" max-width="4xl">
        <x-card title="PET DETAILS">
            <div class="p-5">
                <div class="border-2  grid grid-cols-3">
                    <div class="col-span-1">
                        <img src="{{ Storage::url($pet_data->photo_path ?? '') }}" class="h-40 object-cover w-full"
                            alt="">
                    </div>
                    <div class="col-span-2 p-3">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <h1 class="text-xs">PET NAME</h1>
                                <h1 class="font-medium">{{ $pet_data->name ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">SPECIES</h1>
                                <h1 class="font-medium">{{ $pet_data->species ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">BREED</h1>
                                <h1 class="font-medium">{{ $pet_data->breed ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">COLOR</h1>
                                <h1 class="font-medium">{{ $pet_data->color ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">GENDER</h1>
                                <h1 class="font-medium">{{ $pet_data->gender ?? '' }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="font-bold">APPOINTMENT HISTORY</span>
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($appointments as $item)
                            <li class="flex justify-between gap-x-6 py-1">
                                <div class="flex min-w-0 gap-x-4">

                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold uppercase leading-6 text-red-900">
                                            {{ $item->doctor->fullname }}</p>
                                        <p class=" truncate text-xs leading-5 text-gray-500">
                                            {{ $item->doctor->contact_number }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">
                                        {{ $item->description }}
                                        ({{ \App\Models\ServiceTransaction::where('client_appointment_id', $item->id)->first()->service->name }})
                                    </p>
                                    <p class=" text-xs leading-5 text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->appointment_data)->format('F d, Y h:i A') }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-start gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>


</div>
