<div>
    <div class="grid 2xl:grid-cols-3 grid-cols-1  gap-10">
        <div class="" wire:ignore>
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
                                        <x-dropdown.item icon="eye" label="View" />
                                        <x-dropdown.item icon="thumb-up"
                                            wire:click="approveAppointment({{ $item->id }})" label="Approve" />
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
        </div>
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
</div>
@push('scripts')
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
                events: JSON.parse(eventData), // Parse the Livewire data
                eventClick: function(info) {
                    Livewire.emit('eventClick', info.event)
                }
            });

            calendar.render();
        });
    </script>
@endpush
