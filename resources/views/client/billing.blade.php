@section('title', 'Billing')
<x-client-layout>
    {{-- <div>

    </div> --}}
    <div class="w-full mx-auto 2xl:max-w-7xl px-2 py-14">
        <header class="2xl:text-4xl text-3xl text-gray-700 uppercase font-bold">
            @yield('title')
        </header>
        <div class="2xl:mt-10 mt-5">
            <livewire:client.billing />
        </div>
    </div>
    <script>
        function printOut(data) {
            var mywindow = window.open('', '', 'height=1000,width=1000');
            mywindow.document.head.innerHTML =
                '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
            mywindow.document.body.innerHTML = '<body>' + data + '</body>';

            mywindow.document.close();
            mywindow.focus(); // necessary for IE >= 10
            setTimeout(() => {
                mywindow.print();
                return true;
            }, 1000);




        }
    </script>
</x-client-layout>
