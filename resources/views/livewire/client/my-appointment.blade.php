<div>
    <header class="2xl:text-4xl relative text-3xl flex justify-between items-center text-gray-700 uppercase font-bold">
        <span> @yield('title')</span>
        <x-button label="Make an Appointment" dark icon="plus" href="{{ route('client.make-appointments') }}" />
    </header>
    <div class="bg-white mt-5 rounded-xl shadow-xl relative p-5">
        <div class="flex flex-col space-y-2">
            @foreach ($appointments as $item)
                <div
                    class="2xl:flex 2xl:flex-none  justify-between  items-center p-5 px-10 border-t-2 border rounded-lg {{ $item->status == 'declined' ? 'border-t-red-600' : 'border-t-blue-700' }}">
                    <div>
                        <h1 class="text-gray-500 text-sm">Pet Name</h1>
                        <span
                            class="text-lg leading-3 uppercase">{{ \App\Models\Pets::where('id', $item->pet_id)->first()->name }}</span>
                    </div>
                    <div class="w-96">
                        <h1 class="text-gray-500 text-sm">Description</h1>
                        <p class="text-lg truncate uppercase">
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
                        @elseif ($item->status == 'approved')
                            <x-badge label="Approved" positive flat rounded />
                        @elseif($item->status == 'cancelled')
                            <x-badge label="Cancelled" negative flat rounded />
                        @elseif($item->status == 'request')
                            <x-badge label="Request for Cancellation" warning rounded />
                        @else
                            <x-badge label="Declined" negative flat rounded />
                        @endif
                    </div>
                    <div class="flex justify-end">
                        @if ($item->status != 'declined' && $item->status != 'request' && $item->status != 'cancelled')
                            <x-dropdown>
                                <x-dropdown.header label="Options">
                                    <x-dropdown.item icon="x" label="Cancel Appointment"
                                        wire:click="cancelAppointment({{ $item->id }})" />
                                </x-dropdown.header>

                            </x-dropdown>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
