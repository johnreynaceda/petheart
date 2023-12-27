<div x-data="{ pages: $persist(@entangle('active_page')) }">

    <div class="grid grid-cols-4 gap-5">
        <div class="bg-white border-b-2 border-blue-700 p-4 rounded-xl">
            <div class="border h-auto rounded-lg p-2">
                <div class="bg-gray-800 rounded-lg relative">
                    <img src="{{ Storage::url(\App\Models\Pets::where('id', $appointment_data->pet_id)->first()->photo_path) }}"
                        class=" h-32 w-full rounded-lg opacity-70 object-cover" alt="">
                    <img src="{{ asset('images/newlogo.png') }}" class="absolute bottom-0 left- h-5" alt="">
                </div>
                <div class="mt-2">
                    <p> Pet Name: {{ \App\Models\Pets::where('id', $appointment_data->pet_id)->first()->name }}</p>
                    <p> Owner Name: {{ $appointment_data->user->name }}</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex flex-col flex-grow px-4">
                    <nav class="flex-1 space-y-1 bg-white">
                        <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                            ACTIONS
                        </p>
                        <ul>
                            <li>
                                <a wire:click="$set('active_page', 'consultation')"
                                    class="{{ $active_page == 'consultation' ? 'bg-gray-100 text-blue-500 fill-blue-700 scale-95' : 'text-gray-500 fill-gray-700' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                    href="#">
                                    {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                        aria-label="aperture outline"></ion-icon> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 h-5 md hydrated ">
                                        <path
                                            d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C10.0224 20.3135 4.91625 17.5626 2.8685 13L7.56619 13L8.5 11.4437L11.5 16.4437L13.5662 13H17V11H12.4338L11.5 12.5563L8.5 7.55635L6.43381 11L2.21024 10.9999C2.07418 10.3626 2 9.69615 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3Z">
                                        </path>
                                    </svg>
                                    <span class="ml-3">
                                        CONSULTATION
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a wire:click="$set('active_page', 'diagnoses')"
                                    class="{{ $active_page == 'diagnoses' ? 'bg-gray-100 text-blue-500 fill-blue-700 scale-95' : 'text-gray-500 fill-gray-700' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 h-5 md hydrated ">
                                        <path
                                            d="M20 2C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22H6C5.44772 22 5 21.5523 5 21V19H3V17H5V15H3V13H5V11H3V9H5V7H3V5H5V3C5 2.44772 5.44772 2 6 2H20ZM14 8H12V11H9V13H11.999L12 16H14L13.999 13H17V11H14V8Z">
                                        </path>
                                    </svg>
                                    <span class="ml-3">
                                        TREATMENT PLAN
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a wire:click="$set('active_page', 'prescription')"
                                    class="{{ $active_page == 'prescription' ? 'bg-gray-100 text-blue-500 fill-blue-700 scale-95' : 'text-gray-500 fill-gray-700' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 h-5 md hydrated ">
                                        <path
                                            d="M19.7786 4.22171C22.1217 6.56486 22.1217 10.3639 19.7786 12.707L17.6565 14.8276L12.7075 19.7781C10.3643 22.1212 6.56535 22.1212 4.2222 19.7781C1.87906 17.4349 1.87906 13.6359 4.2222 11.2928L11.2933 4.22171C13.6364 1.87857 17.4354 1.87857 19.7786 4.22171ZM14.8288 14.8283L9.17195 9.17146L5.63642 12.707C4.07432 14.2691 4.07432 16.8018 5.63642 18.3638C7.19851 19.9259 9.73117 19.9259 11.2933 18.3638L14.8288 14.8283Z">
                                        </path>
                                    </svg>
                                    <span class="ml-3">
                                        PRESCRIPTION
                                    </span>
                                </a>
                            </li>
                        </ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-span-3 ">
            <div class="bg-white rounded-xl p-8" x-cloak>
                <div x-show="pages == 'consultation'">
                    <header>
                        <h1 class="text-xl uppercase font-bold text-gray-600">Consultation</h1>
                    </header>
                    <div class="mt-5">
                        {{ $this->table }}
                    </div>
                </div>

                <div x-show="pages == 'diagnoses'">
                    <header>
                        <h1 class="text-xl uppercase font-bold text-gray-600">DIAGNOSES (TREATMENT PLAN)</h1>
                    </header>
                    <div class="mt-5">
                        @include('admin.manage.diagnoses')
                    </div>
                </div>

                <div x-show="pages == 'prescription'">
                    <header>
                        <h1 class="text-xl uppercase font-bold text-gray-600">Prescription</h1>
                    </header>
                    <div class="mt-5">
                        @include('admin.manage.prescription')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
