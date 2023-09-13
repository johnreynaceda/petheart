<div>
    <div class="bg-white rounded-xl shadow-xl relative p-5">
        <div class="flex flex-col space-y-2">
            @foreach ($appointments as $item)
                <div class="flex justify-between items-center p-5 px-10 border-t-2 border rounded-lg border-t-blue-700">
                    <div>
                        <h1 class="text-gray-500 text-sm">Pet Name</h1>
                        <span
                            class="text-lg leading-3 uppercase">{{ \App\Models\Pets::where('id', $item->pet_id)->first()->name }}</span>
                    </div>
                    <div class="w-96">
                        <h1 class="text-gray-500 text-sm">Description</h1>
                        <p class="text-lg truncate leading-3 uppercase">
                            {{ $item->description }}
                        </p>
                    </div>
                    <div>
                        <h1 class="text-gray-500 text-sm">Appointment Date</h1>
                        {{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i a') }}
                    </div>
                    <div>
                        <h1 class="text-gray-500 text-sm">Status</h1>
                        @if ($item->status == 'pending')
                            <x-badge label="Pending" warning flat rounded />
                        @else
                            <x-badge label="Accepted" positive flat rounded />
                        @endif
                    </div>
                    <div>
                        <x-dropdown>
                            <x-dropdown.header label="Options">
                                <x-dropdown.item icon="x" label="Cancel Appointment" />
                            </x-dropdown.header>

                        </x-dropdown>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
