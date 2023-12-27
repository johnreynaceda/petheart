@section('title', 'Create Appointment')
<x-client-layout>
    {{-- <div>

    </div> --}}
    <div class="w-full mx-auto 2xl:max-w-7xl px-2 py-14">
        <header class="2xl:text-4xl text-3xl text-gray-700 uppercase font-bold">
            @yield('title')
        </header>
        <div class="mt-5 bg-gray-300 p-5 rounded-xl">
            <p class="text-red-600 animate-pulse">Note: Please add your pets to proceed. Thank you!</p>
        </div>
        <div class="2xl:mt-10 mt-5">
            <livewire:client.make-appointment />
        </div>
    </div>
</x-client-layout>
