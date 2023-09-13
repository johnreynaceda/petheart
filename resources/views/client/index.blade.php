@section('title', 'Dashboard')
<x-client-layout>
    <div class="'relative">
        <section>
            <div class="flex flex-col justify-center flex-1 ">
                <div>
                    <div class="relative overflow-hidden">
                        <div class="mx-auto">
                            <div class="relative overflow-hidden shadow-xl">
                                <div class="absolute inset-0">
                                    <img class="object-cover w-full h-full opacity-90"
                                        src="https://images.unsplash.com/photo-1596272875729-ed2ff7d6d9c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                        alt="">
                                    <div class="absolute inset-0 bg-gray-800 mix-blend-multiply"></div>
                                </div>
                                <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-52 lg:px-8">
                                    <div class="max-w-2xl px-10 pt-10 mx-auto text-center">
                                        <div>
                                            <p
                                                class="2xl:text-6xl animate__animated animate__slideInDown  text-4xl tracking-tight font-black text-white">
                                                Excellent Pet deserves Excellent Care
                                            </p>
                                            <p
                                                class="max-w-xl mt-4 animate__animated animate__fadeIn 2xl:text-xl text-sm tracking-tight text-gray-100">
                                                We offer a warm and welcoming environment where your pet's comfort comes
                                                first. Our state-of-the-art facilities are designed to ensure a
                                                stress-free
                                                experience for both you and your furry friend.
                                            </p>

                                        </div>

                                    </div>
                                    <div class="flex justify-center">
                                        <button onclick="window.location.href='{{ route('client.make-appointments') }}'"
                                            class="animate__animated animate__fadeInUp 2xl:mt-20 mt-10 p-4 bg-transaparent border-2 font-bold text-white rounded-full px-10 2xl:text-lg text-sm hover:bg-blue-800">
                                            <span>Make an Appointment</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-client-layout>
