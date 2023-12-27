<div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="print_modal" align="center" max-width="6xl">
        <x-card title=" REPORT">
            <div class="px-5 py-2 bg-gray-100 rounded-xl flex items-center space-x-2">
                <x-datetime-picker label="Date From:" without-time wire:model="date_from" />
                <x-datetime-picker label="Date To:" without-time wire:model="date_to" />
            </div>
            <div class="p-5 w-full" x-ref="printContainer">
                <div>
                    <div class=" ">
                        <img src="{{ asset('images/newlogo.png') }}" class="border" alt="">
                        <h1 class="font-bold text-xl">List of Clients</h1>
                    </div>
                    <table id="example" class="table-auto mt-5" style="width:100%">
                        <thead class="font-normal">
                            <tr>

                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">FULLNAME</th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">CONTACT
                                    NUMBER
                                </th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">ADDRESS
                                </th>

                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $client->firstname . ' ' . $client->lastname }}</td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $client->contact_number }}
                                    </td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $client->address }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Print" right-icon="printer"
                        @click="printOut($refs.printContainer.outerHTML);" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
