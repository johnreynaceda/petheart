<div x-data>
    <div class="relative">
        {{ $this->table }}
    </div>

    <x-modal blur wire:model.defer="invoice_modal">
        <div
            class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl bg-white">
            <div class="">
                <div x-ref="printContainer">
                    <div class="p-5 border-t-4 border-blue-700 flex justify-between">
                        <div>
                            <img src="{{ asset('images/newlogo.png') }}" class="h-10" alt="">
                            <h1 class="font-medium text-xl ml-2">INVOICE</h1>
                        </div>
                        <div class="text-right">
                            <h1 class="text-lg">PetHeart Veterinary Clinic and Supplies</h1>
                            <p class="">

                                Nepo Mall, Ground floor, Arellano street, Pantal, Pangasinan
                            </p>
                            <h1 class="">Dagupan City</h1>
                            <h1 class="">Philippines</h1>
                            <h1 class="">2402</h1>
                        </div>
                    </div>
                    <div class="my-4 py-3 mx-5 flex justify-between border-b-2 border-t-2">
                        <div>
                            <div>
                                <h1 class="text-sm">BILL TO:</h1>
                                <span class="font-semibold">
                                    @if ($appointment_data)
                                        {{ $appointment_data->user->name }}
                                    @endif
                                </span>
                            </div>
                            <div>
                                <h1 class="text-sm">PET NAME:</h1>
                                <span class="font-semibold">

                                    @if ($appointment_data)
                                        {{ \App\Models\Pets::where('id', $appointment_data->pet_id)->first()->name }}
                                    @endif
                                </span>

                            </div>
                        </div>

                        <div class="text-right">
                            <div>
                                <h1 class="text-sm">INVOICE #:</h1>
                                <span class="font-semibold">000000{{ \App\Models\Prescription::count() }}</span>
                            </div>
                            <div>
                                <h1 class="text-sm">DATE:</h1>
                                <span class="font-semibold">{{ \Carbon\Carbon::parse(now())->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-5 mx-5">
                        <div class="">
                            <div class="flex flex-col mx-0 ">
                                <table class="min-w-full divide-y divide-slate-500">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-1 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                                Medicine
                                            </th>
                                            <th scope="col"
                                                class="hidden py-1 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                                Quantity
                                            </th>
                                            <th scope="col"
                                                class="hidden py-1 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                                Rate
                                            </th>
                                            <th scope="col"
                                                class="py-1 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach ($prescription_data as $item)
                                            <tr class="border-b border-slate-200">
                                                <td class="py-1 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                    <div class="font-medium text-slate-700">{{ $item->medicine->name }}
                                                    </div>
                                                </td>
                                                <td
                                                    class="hidden px-3 py-1 text-sm text-right text-slate-500 sm:table-cell">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td
                                                    class="hidden px-3 py-1 text-sm text-right text-slate-500 sm:table-cell">
                                                    &#8369;{{ $item->medicine->price }}
                                                </td>
                                                <td
                                                    class="py-1 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                    &#8369;{{ number_format($item->medicine->price * $item->quantity, 2) }}
                                                </td>
                                            </tr>
                                            @php
                                                $subtotal += $item->medicine->price * $item->quantity;
                                            @endphp
                                        @endforeach

                                        <!-- Here you can write more products/tasks that you want to charge for-->
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-1 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                                Service
                                            </th>
                                            <th scope="col"
                                                class="hidden py-1 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">

                                            </th>
                                            <th scope="col"
                                                class="hidden py-1 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                                Rate
                                            </th>
                                            <th scope="col"
                                                class="py-1 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $subtotalservices = 0;
                                    @endphp
                                    @foreach ($services_data as $item)
                                        <tr class="border-b border-slate-200">
                                            <td class="py-1 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                <div class="font-medium text-slate-700">{{ $item->service->name }}
                                                </div>
                                            </td>
                                            <td
                                                class="hidden px-3 py-1 text-sm text-right text-slate-500 sm:table-cell">

                                            </td>
                                            <td
                                                class="hidden px-3 py-1 text-sm text-right text-slate-500 sm:table-cell">
                                                &#8369;{{ number_format($item->service->price, 2) }}
                                            </td>
                                            <td
                                                class="py-1 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                &#8369;{{ number_format($item->service->price, 2) }}
                                            </td>
                                        </tr>
                                        @php
                                            $subtotalservices += $item->service->price;
                                        @endphp
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th scope="row" colspan="3"
                                                class="hidden pt-2 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                                                Subtotal
                                            </th>
                                            <th scope="row"
                                                class="pt-2 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                                                Subtotal
                                            </th>
                                            <td
                                                class="pt-2 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                &#8369; {{ number_format($subtotal + $subtotalservices, 2) }}
                                            </td>
                                        </tr>


                                        <tr>
                                            <th scope="row" colspan="3"
                                                class="hidden pt-2 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                                Total
                                            </th>
                                            <th scope="row"
                                                class="pt-4 pl-2 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                                Total
                                            </th>
                                            <td
                                                class="pt-4 pl-3 pr-4 text-sm font-bold text-right text-red-700 sm:pr-6 md:pr-0">
                                                &#8369; {{ number_format($subtotal + $subtotalservices, 2) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-5 mx-5">
                    <x-button label="Print Invoice" @click="printOut($refs.printContainer.outerHTML);" icon="printer"
                        dark />
                    <x-button label="Close" icon="x" x-on:click="close" outline dark />
                </div>
            </div>

        </div>
    </x-modal>

    <x-modal blur wire:model.defer="plan_modal">
        <div
            class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl bg-white">
            <div class="">
                <div class="p-5" x-ref="printContainer">
                    <img src="{{ asset('images/newlogo.png') }}" class="h-20" alt="">
                    <h1 class="text-xl">TREATMENT PLAN</h1>
                    <div class="mt-5">
                        <div class="border-b-2">
                            <h1>PATIENT INFORMATION</h1>
                        </div>
                        <div class="mt-2 grid grid-cols-3 gap-5">
                            <div>
                                <h1 class="text-sm">Name:</h1>
                                <h1 class="font-medium uppercase">{{ $pet_data->name ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Species:</h1>
                                <h1 class="font-medium uppercase">{{ $pet_data->species ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Breed:</h1>
                                <h1 class="font-medium uppercase">{{ $pet_data->breed ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Gender:</h1>
                                <h1 class="font-medium uppercase">{{ $pet_data->gender ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Color:</h1>
                                <h1 class="font-medium uppercase">{{ $pet_data->color ?? '' }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="border-b-2">
                            <h1>PROVIDER INFORMATION</h1>
                        </div>
                        <div class="mt-2 ">
                            <div>
                                <h1 class="text-sm">Full Name:</h1>
                                <h1 class="font-medium uppercase">
                                    {{ ($appointment_data->user->user_information->firstname ?? '') . ' ' . ($appointment_data->user->user_information->lastname ?? '') }}
                                </h1>
                            </div>

                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="border-b-2">
                            <h1>DIAGNOSIS</h1>
                        </div>
                        <div class="mt-2 ">
                            <ul>
                                @foreach ($plan_data as $item)
                                    <li>{{ $item->plan }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="border-b-2">
                            <h1>PRESCRIPTION</h1>
                        </div>
                        <div class="mt-2 ">

                            <table id="example" class="table-auto mt-5" style="width:100%">
                                <thead class="font-normal">
                                    <tr>
                                        <th class="border-2 w-64  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                            MEDICINE NAME</th>
                                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                            DESCRIPTION
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($prescription_data as $item)
                                        <tr>
                                            <td class="border-2  text-gray-700  px-3 py-1">{{ $item->medicine->name }}
                                            </td>
                                            <td class="border-2  text-gray-700  px-3 py-1">
                                                <p>{{ $item->description }}</p>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="my-5 mx-5">
                    <x-button label="Print Invoice" @click="printOut($refs.printContainer.outerHTML);" icon="printer"
                        dark />
                    <x-button label="Close" icon="x" x-on:click="close" outline dark />
                </div>
            </div>

        </div>
    </x-modal>
</div>
