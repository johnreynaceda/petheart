<div>
    <div>
        <div class="grid grid-cols-3 gap-10">
            <div>
                <div class="bg-gray-100 p-5  relative rounded-xl">
                    <div class="flex flex-col space-y-4">
                        <x-native-select label="Doctor" wire:model="doctor_id">
                            <option>Select an Option</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->fullname }}</option>
                            @endforeach
                        </x-native-select>
                        <x-native-select label="Pets" wire:model="pet_id">
                            <option>Select an Option</option>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                            @endforeach
                        </x-native-select>
                        <x-native-select label="Services" wire:model="service_id">
                            <option>Select an Option</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </x-native-select>
                        <x-datetime-picker label="Appointment Date" without-timezone interval="30" :min="now()"
                            min-time="08:00" max-time="20:30" wire:model.defer="appointment_date" />
                        <x-textarea wire:model="description" label="Description" placeholder="" />
                    </div>
                    <div class="mt-5 flex space-x-2">
                        <x-button label="Submit" wire:click="submitAppointment" spinner="submitAppointment" positive
                            rounded class="font-bold" right-icon="save" />
                        <x-button label="Cancel" negative flat rounded class="font-bold" />
                    </div>
                </div>

            </div>
            <div class=" col-span-2 bg-white bg-opacity-50 relative p-10 border-t-2 border-t-blue-600 border ">
                <div wire:ignore>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <style>
        #calendar .fc-button {
            background-color: #1B7B8B;
            border-color: #1B7B8B;
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
                eventColor: '#1B7B8B',
                events: JSON.parse(eventData), // Parse the Livewire data
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
