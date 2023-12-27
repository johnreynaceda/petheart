<div>
    <div class="grid ">
        {{-- <div class="" wire:ignore>
            <div class="bg-white p-5 rounded-xl">
                <header class="text-lg font-semibold uppercase text-gray-700">
                    <span>APPOINTMENTS</span>
                </header>
                <div class="mt-5 flex flex-col space-y-2">
                    @forelse ($appointments as $item)
                        <div
                            class="border rounded-xl p-2 px-4 flex text-sm justify-between items-center border-l-2 border-l-blue-500">
                            <div>
                                <h1 class="font-bold text-blue-700 uppercase">{{ $item->user->name }}</h1>
                                <span
                                    class="leading-3">({{ \App\Models\Pets::where('id', $item->pet_id)->first()->name }})</span>
                            </div>
                            <div>
                                <h1>Date</h1>
                                <span
                                    class="text-xs">{{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i A') }}</span>
                            </div>
                            <div>
                                <x-dropdown>
                                    <x-dropdown.header label="Options">
                                        <x-dropdown.item icon="eye" label="View"
                                            wire:click="open_modal({{ $item->id }})" />
                                        <x-dropdown.item icon="thumb-up"
                                            wire:click="approveAppointment({{ $item->id }})" label="Approve" />
                                        <x-dropdown.item icon="thumb-down"
                                            wire:click="declineAppointment({{ $item->id }})" label="Decline" />
                                    </x-dropdown.header>
                                </x-dropdown>
                            </div>
                        </div>
                    @empty

                        <div class="text-gray-500">
                            No Appointments Available...
                        </div>
                    @endforelse
                </div>
            </div>

            @if (\App\Models\ClientAppointment::where('status', 'request')->count() > 0)
                <div class="bg-white p-5 mt-10 rounded-xl">
                    <header class="text-lg font-semibold uppercase text-gray-700">
                        <span>CANCELLATION REQUESTS</span>
                    </header>
                    <div class="mt-5 flex flex-col space-y-2">
                        @forelse (\App\Models\ClientAppointment::where('status', 'request')->get() as $item)
                            <div
                                class="border rounded-xl p-2 px-4 flex text-sm justify-between items-center border-l-2 border-l-red-500">
                                <div>
                                    <h1 class="font-bold text-red-700 uppercase">{{ $item->user->name }}</h1>
                                    <span
                                        class="leading-3">({{ \App\Models\Pets::where('id', $item->pet_id)->first()->name }})</span>
                                </div>
                                <div>
                                    <h1>Date</h1>
                                    <span
                                        class="text-xs">{{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i A') }}</span>
                                </div>
                                <div>
                                    <x-dropdown>
                                        <x-dropdown.header label="Options">
                                            <x-dropdown.item icon="check"
                                                wire:click="cancelAppointment({{ $item->id }})"
                                                label="Approve Cancellation" />
                                        </x-dropdown.header>
                                    </x-dropdown>
                                </div>
                            </div>
                        @empty

                            <div class="text-gray-500">
                                No Appointments Available...
                            </div>
                        @endforelse
                    </div>
                </div>
            @endif
        </div> --}}
        <div class="col-span-2">
            <div class="calendar">
                <div class="bg-white rounded-xl p-6">
                    <div id='calendar' wire:ignore></div>
                </div>
            </div>
        </div>
    </div>
    <x-modal wire:model.defer="event_modal" align="center">
        <x-card title="APPOINTMENT DETAILS">
            <div>
                <div class="py-4">
                    <h1 class="font-bold text-xl text-blue-800 uppercase">APPOINTMENT DATE</h1>
                    <span
                        class="leading-3">{{ \Carbon\Carbon::parse($event_data['start'] ?? '')->format('F d, Y h:i A') }}</span>
                </div>
                @if ($event_data)
                    <ul>
                        @foreach ($event_data['extendedProps'] as $key => $value)
                            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat negative label="Close" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="view_modal" align="center">
        <x-card title="APPOINTMENT DETAILS">
            <div class="flex flex-col space-y-2">
                <div>
                    <span class="text-sm">PET OWNER</span>
                    <h1 class="font-bold uppercase">{{ $appointment_data->user->name ?? '' }}</h1>
                </div>
                <div>
                    <span class="text-sm">PET NAME</span>
                    <h1 class="font-bold uppercase">
                        {{ \App\Models\Pets::where('id', $appointment_data->pet_id ?? '')->first()->name ?? '' }}</h1>
                </div>
                <div>
                    <span class="text-sm">DOCTOR NAME</span>
                    <h1 class="font-bold uppercase">{{ $appointment_data->doctor->fullname ?? '' }}</h1>
                </div>
                <div>
                    <span class="text-sm">APPOINTMENT DATE</span>
                    <h1 class="font-bold uppercase">
                        {{ \Carbon\Carbon::parse($appointment_data->appointment_date ?? '')->format('F d, Y h:i A') }}
                    </h1>
                </div>
                <div>
                    <span class="text-sm">SERVICE </span>
                    <h1 class="font-bold uppercase">
                        {{ \App\Models\ServiceTransaction::where('client_appointment_id', $appointment_data->id ?? '')->first()->service->name ?? '' }}
                    </h1>
                </div>
                <div>
                    <span class="text-sm">DESCRIPTION </span>
                    <h1 class="font-bold uppercase">
                        {{ $appointment_data->description ?? '' }}
                    </h1>
                </div>
                <div>
                    <span class="text-sm">STATUS</span>
                    <div>

                        @if ($appointment_status == true)
                            @if ($appointment_data->status == 'pending')
                                <x-badge label="Pending" warning flat rounded lg />
                            @elseif ($appointment_data->status == 'accepted')
                                <x-badge label="Accepted" positive flat rounded lg />
                            @elseif($appointment_data->status == 'cancelled')
                                <x-badge label="Cancelled" negative flat rounded lg />
                            @else
                                <x-badge label="Declined" negative flat rounded lg />
                            @endif
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat negative label="Close" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
@push('scripts')
    <style>
        #calendar .fc-button {
            background-color: #023564;
            border-color: #023564;
        }
    </style>
    <script>
        document.addEventListener('livewire:load', function() {
            var calendarEl = document.getElementById('calendar');
            var eventData = @this.events; // Livewire data binding

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // FullCalendar options here
                initialView: 'dayGridMonth',
                views: {
                    timeGridWeek: {
                        type: 'timeGrid',
                        duration: {
                            days: 7
                        },
                        buttonText: 'week'
                    }
                },
                headerToolbar: {
                    start: 'prev next',
                    center: 'title',
                    end: 'timeGridWeek dayGridMonth'
                },
                displayEventTime: true,
                eventColor: '#023564',
                events: JSON.parse(eventData),
                eventClick: function(info) {
                    Livewire.emit('eventClicked', info.event);
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
            });

            calendar.render();
        });
    </script>
@endpush
