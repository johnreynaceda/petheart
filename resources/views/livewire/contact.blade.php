<div>
    <div>
        <div class="grid gap-4">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="hs-firstname-contacts-1" class="sr-only">First Name</label>
                    <input type="text" wire:model="firstname" name="hs-firstname-contacts-1" id="hs-firstname-contacts-1"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="First Name">
                    @error('firstname')
                        <span class="text-xs text-red-300">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="hs-lastname-contacts-1" class="sr-only">Last Name</label>
                    <input type="text" wire:model="lastname" name="hs-lastname-contacts-1"
                        id="hs-lastname-contacts-1"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="Last Name">
                    @error('lastname')
                        <span class="text-xs text-red-300">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- End Grid -->

            <div>
                <label for="hs-email-contacts-1" class="sr-only">Email</label>
                <input type="email" wire:model="email" name="hs-email-contacts-1" id="hs-email-contacts-1"
                    autocomplete="email"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="Email">
                @error('email')
                    <span class="text-xs text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="hs-phone-number-1" class="sr-only">Phone Number</label>
                <input type="text" wire:model="phone" name="hs-phone-number-1" id="hs-phone-number-1"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="Phone Number">
                @error('phone')
                    <span class="text-xs text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="hs-about-contacts-1" class="sr-only">Details</label>
                <textarea wire:model="details" id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="Details"></textarea>
                @error('details')
                    <span class="text-xs text-red-300">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- End Grid -->

        <div class="mt-4 grid">
            <button type="submit" wire:click="sendEmail"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Send
                inquiry</button>
        </div>

        <div class="mt-3 text-center">
            <p class="text-sm text-gray-100">
                We'll get back to you in 1-2 business days.
            </p>
        </div>
    </div>
</div>
