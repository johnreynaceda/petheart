<div x-data>
    <div>
        {{ $this->table }}
    </div>
    <x-modal.card title="PET DETAILS" fullscreen blur wire:model.defer="view_records">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
            <div class="">
                <div class="p-3 px-5 bg-blue-900 relative rounded-xl text-white flex justify-between items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.dev/svgjs"
                        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover" preserveAspectRatio="none"
                        viewBox="0 0 500 100">
                        <g mask="url(&quot;#SvgjsMask1010&quot;)" fill="none">
                            <rect width="500" height="100" x="0" y="0"
                                fill="url(&quot;#SvgjsLinearGradient1011&quot;)"></rect>
                            <path
                                d="M 0,11 C 20,17.2 60,43.6 100,42 C 140,40.4 160,1.8 200,3 C 240,4.2 260,47 300,48 C 340,49 360,11.8 400,8 C 440,4.2 480,24.8 500,29L500 100L0 100z"
                                fill="#184a7e"></path>
                            <path
                                d="M 0,71 C 33.4,72.8 100.2,83 167,80 C 233.8,77 267.4,52.8 334,56 C 400.6,59.2 466.8,88 500,96L500 100L0 100z"
                                fill="#2264ab"></path>
                        </g>
                        <defs>
                            <mask id="SvgjsMask1010">
                                <rect width="500" height="100" fill="#ffffff"></rect>
                            </mask>
                            <linearGradient x1="20%" y1="-100%" x2="80%" y2="200%"
                                gradientUnits="userSpaceOnUse" id="SvgjsLinearGradient1011">
                                <stop stop-color="#0e2a47" offset="0"></stop>
                                <stop stop-color="#00459e" offset="1"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="font-bold relative">PET INFORMATION</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 relative fill-white w-6">
                        <path
                            d="M13.4142 10.5856L13.8936 11.0717L14.3585 11.5565L14.8177 12.049C18.2758 15.8129 20.2896 19.2665 19.4246 20.1316C19.0242 20.532 18.069 20.3155 16.7851 19.6244C13.5839 21.638 9.38982 21.4407 6.38249 19.0325L9.36197 16.0536C10.0289 16.2312 10.7697 16.0585 11.2929 15.5354C12.0739 14.7543 12.0739 13.488 11.2929 12.7069C10.5118 11.9259 9.24551 11.9259 8.46447 12.7069C7.98129 13.1901 7.79702 13.859 7.91165 14.4838L7.94653 14.639L4.968 17.6181C2.55913 14.6107 2.36164 10.4162 4.37553 7.21411C3.68433 5.93082 3.46783 4.97564 3.86827 4.5752C4.84458 3.59889 9.11845 6.28985 13.4142 10.5856ZM19.7782 4.22165C20.5592 5.0027 20.5592 6.26903 19.7782 7.05008C19.7254 7.10285 19.6704 7.15205 19.6135 7.19768C21.2304 9.7539 21.4333 12.9495 20.2214 15.6675C19.0324 13.7133 17.1513 11.4943 14.8284 9.1714L14.2905 8.6396C12.1634 6.56127 10.1352 4.87547 8.3327 3.77903C11.0504 2.56667 14.2459 2.76941 16.804 4.38688C16.8478 4.3294 16.897 4.27442 16.9497 4.22165C17.7308 3.4406 18.9971 3.4406 19.7782 4.22165Z">
                        </path>
                    </svg>
                </div>
                <div class="my-3 pb-3 border-b grid grid-cols-3 gap-5">
                    <div class="col-span-1">
                        <img src="{{ Storage::url($pets->photo_path ?? '') }}" class="h-40 w-full object-cover"
                            alt="">
                    </div>
                    <div class="col-span-2 p-3">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <h1 class="text-xs">PET NAME</h1>
                                <h1 class="font-medium">{{ $pets->name ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">SPECIES</h1>
                                <h1 class="font-medium">{{ $pets->species ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">BREED</h1>
                                <h1 class="font-medium">{{ $pets->breed ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">COLOR</h1>
                                <h1 class="font-medium">{{ $pets->color ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">GENDER</h1>
                                <h1 class="font-medium">{{ $pets->gender ?? '' }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="p-3 px-5 bg-blue-900 relative rounded-xl text-white flex justify-between items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.dev/svgjs"
                        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover" preserveAspectRatio="none"
                        viewBox="0 0 500 100">
                        <g mask="url(&quot;#SvgjsMask1010&quot;)" fill="none">
                            <rect width="500" height="100" x="0" y="0"
                                fill="url(&quot;#SvgjsLinearGradient1011&quot;)"></rect>
                            <path
                                d="M 0,11 C 20,17.2 60,43.6 100,42 C 140,40.4 160,1.8 200,3 C 240,4.2 260,47 300,48 C 340,49 360,11.8 400,8 C 440,4.2 480,24.8 500,29L500 100L0 100z"
                                fill="#184a7e"></path>
                            <path
                                d="M 0,71 C 33.4,72.8 100.2,83 167,80 C 233.8,77 267.4,52.8 334,56 C 400.6,59.2 466.8,88 500,96L500 100L0 100z"
                                fill="#2264ab"></path>
                        </g>
                        <defs>
                            <mask id="SvgjsMask1010">
                                <rect width="500" height="100" fill="#ffffff"></rect>
                            </mask>
                            <linearGradient x1="20%" y1="-100%" x2="80%" y2="200%"
                                gradientUnits="userSpaceOnUse" id="SvgjsLinearGradient1011">
                                <stop stop-color="#0e2a47" offset="0"></stop>
                                <stop stop-color="#00459e" offset="1"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="font-bold relative">OWNER INFORMATION</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 relative fill-white w-6">
                        <path
                            d="M7.38938 16.5386C5.33894 15.0901 4 12.7014 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 12.7014 18.6611 15.0901 16.6106 16.5386L18.6936 21.2996C18.8043 21.5526 18.6889 21.8474 18.4359 21.9581C18.3727 21.9857 18.3045 22 18.2355 22H5.76451C5.48837 22 5.26451 21.7761 5.26451 21.5C5.26451 21.431 5.27878 21.3628 5.30643 21.2996L7.38938 16.5386ZM8.11851 10.9704C8.55217 12.7106 10.1255 14 12 14C13.8745 14 15.4478 12.7106 15.8815 10.9704L13.9407 10.4852C13.7239 11.3553 12.9372 12 12 12C11.0628 12 10.2761 11.3553 10.0593 10.4852L8.11851 10.9704Z">
                        </path>
                    </svg>
                </div>
                <div class="mt-3 pb-3">
                    <div class=" p-3 border-b">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <h1 class="text-xs">OWNER</h1>
                                <h1 class="font-medium uppercase">{{ $pets->user->name ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">EMAIL</h1>
                                <h1 class="font-medium">{{ $pets->user->email ?? '' }}</h1>
                            </div>
                            <div>
                                <h1 class="text-xs">CREATED AT</h1>
                                <h1 class="font-medium">{{ $pets->user->created_at ?? '' }}</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="p-3 px-5 bg-blue-900 relative rounded-xl text-white flex justify-between items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.dev/svgjs"
                        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover" preserveAspectRatio="none"
                        viewBox="0 0 500 100">
                        <g mask="url(&quot;#SvgjsMask1010&quot;)" fill="none">
                            <rect width="500" height="100" x="0" y="0"
                                fill="url(&quot;#SvgjsLinearGradient1011&quot;)"></rect>
                            <path
                                d="M 0,11 C 20,17.2 60,43.6 100,42 C 140,40.4 160,1.8 200,3 C 240,4.2 260,47 300,48 C 340,49 360,11.8 400,8 C 440,4.2 480,24.8 500,29L500 100L0 100z"
                                fill="#184a7e"></path>
                            <path
                                d="M 0,71 C 33.4,72.8 100.2,83 167,80 C 233.8,77 267.4,52.8 334,56 C 400.6,59.2 466.8,88 500,96L500 100L0 100z"
                                fill="#2264ab"></path>
                        </g>
                        <defs>
                            <mask id="SvgjsMask1010">
                                <rect width="500" height="100" fill="#ffffff"></rect>
                            </mask>
                            <linearGradient x1="20%" y1="-100%" x2="80%" y2="200%"
                                gradientUnits="userSpaceOnUse" id="SvgjsLinearGradient1011">
                                <stop stop-color="#0e2a47" offset="0"></stop>
                                <stop stop-color="#00459e" offset="1"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="font-bold relative">APPOINTMENT RECORDS</span>

                </div>
                <table id="example" class="table-auto mt-5" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2 w-64  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                DOCTOR FULLNAME</th>
                            <th class="border-2   text-left px-2 text-sm font-bold text-gray-700 py-2">
                                SERVICE</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                APPOINTMENT DATE
                            </th>

                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($appointments as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">{{ $item->doctor->fullname }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \App\Models\ServiceTransaction::where('client_appointment_id', $item->id)->first()->service->name }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    <p>{{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i A') }}</p>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

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
                        <h1 class="font-bold text-xl">List of Pets</h1>
                    </div>
                    <table id="example" class="table-auto mt-5" style="width:100%">
                        <thead class="font-normal">
                            <tr>

                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">PET NAME
                                </th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">SPECIES
                                </th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">BREED
                                </th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">COLOR
                                </th>
                                <th class="border-2 text-left px-2 text-sm font-medium text-gray-500 py-2">GENDER
                                </th>

                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($petss as $pet)
                                <tr>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $pet->name }}</td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $pet->species }}
                                    </td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $pet->breed }}
                                    </td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $pet->color }}
                                    </td>
                                    <td class="border-2 text-gray-600  px-3 py-1">
                                        {{ $pet->gender }}
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
