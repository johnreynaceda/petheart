<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:svgjs="http://svgjs.dev/svgjs" class="fixed object-cover top-0 bottom-0 left-0 right-0 w-full h-full"
        class="" preserveAspectRatio="none" viewBox="0 0 1920 1080">
        <g mask="url(&quot;#SvgjsMask19889&quot;)" fill="none">
            <circle r="90" cx="1718" cy="747.88" fill="#e73635"></circle>
            <circle r="90" cx="405.6" cy="373.24" stroke="#037b0b" stroke-width="1" stroke-dasharray="2, 2">
            </circle>
            <rect width="140" height="140" clip-path="url(&quot;#SvgjsClipPath19890&quot;)" x="1249.84" y="808.71"
                fill="url(&quot;#SvgjsPattern19891&quot;)" transform="rotate(65.68, 1319.84, 878.71)">
            </rect>
            <rect width="267.52" height="267.52" clip-path="url(&quot;#SvgjsClipPath19892&quot;)" x="1424" y="-96.65"
                fill="url(&quot;#SvgjsPattern19893&quot;)" transform="rotate(25.62, 1557.76, 37.11)">
            </rect>
            <rect width="504" height="504" clip-path="url(&quot;#SvgjsClipPath19894&quot;)" x="591.26" y="462.74"
                fill="url(&quot;#SvgjsPattern19895&quot;)" transform="rotate(324.04, 843.26, 714.74)">
            </rect>
            <path
                d="M1231.01 844.95L1239.62 854.43 1232.26 864.91 1240.87 874.39 1233.51 884.87 1242.12 894.35 1234.76 904.83"
                stroke="#d3b714" stroke-width="2.89" stroke-dasharray="3, 2"></path>
            <circle r="90" cx="5.65" cy="914.06" fill="#e73635"></circle>
            <path
                d="M192.65 726.27a5.6 5.6 0 1 0-4.08 10.43 5.6 5.6 0 1 0 4.08-10.43zM186.82 741.17a5.6 5.6 0 1 0-4.07 10.43 5.6 5.6 0 1 0 4.07-10.43zM181 756.07a5.6 5.6 0 1 0-4.07 10.43 5.6 5.6 0 1 0 4.07-10.43zM175.18 770.97a5.6 5.6 0 1 0-4.08 10.44 5.6 5.6 0 1 0 4.08-10.44z"
                fill="#037b0b"></path>
        </g>
        <defs>
            <mask id="SvgjsMask19889">
                <rect width="1920" height="1080" fill="#ffffff"></rect>
            </mask>
            <pattern x="0" y="0" width="140" height="14" patternUnits="userSpaceOnUse" id="SvgjsPattern19891">
                <rect width="140" height="7" x="0" y="0" fill="#037b0b"></rect>
                <rect width="140" height="7" x="0" y="7" fill="rgba(0, 0, 0, 0)"></rect>
            </pattern>
            <clipPath id="SvgjsClipPath19890">
                <circle r="35" cx="1319.84" cy="878.71"></circle>
            </clipPath>
            <pattern x="0" y="0" width="12.16" height="12.16" patternUnits="userSpaceOnUse" id="SvgjsPattern19893">
                <path d="M0 12.16L6.08 0L12.16 12.16" stroke="#e73635" fill="none"></path>
            </pattern>
            <clipPath id="SvgjsClipPath19892">
                <circle r="66.88" cx="1557.76" cy="37.11"></circle>
            </clipPath>
            <pattern x="0" y="0" width="6" height="6" patternUnits="userSpaceOnUse" id="SvgjsPattern19895">
                <path d="M0 6L3 0L6 6" stroke="#e73635" fill="none"></path>
            </pattern>
            <clipPath id="SvgjsClipPath19894">
                <circle r="126" cx="843.26" cy="714.74"></circle>
            </clipPath>
        </defs>
    </svg>
    <div class="w-full  bg-white relative border-b ">
        <div class="2xl:max-w-7xl mx-auto">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full  mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-lg tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <img src="{{ asset('images/newlogo.png') }}" alt="">
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                    <a class="px-2 py-2  font-medium text-gray-500 lg:ml-auto lg:px-6 md:px-3 hover:text-blue-600"
                        href="/">
                        Home
                    </a>
                    <a class="px-2 py-2 font-medium  text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                        href="{{ route('services') }}">
                        Services
                    </a>
                    <a class="px-2 py-2 font-medium  text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                        href="{{ route('contacts') }}">
                        Contacts
                    </a>

                    <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                        <a href="{{ route('login') }}"
                            class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 font-medium hover:text-blue-600 focus:outline-none focus:shadow-outline">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium font-semibold text-white bg-blue-700 rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-blue-800 active:bg-blue-800 active:text-white focus-visible:outline-black">
                            Sign up
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>



    <section class="py-12 mx-auto relative max-w-7xl">
        <div>
            <header class="font-bold text-2xl">
                Services offered
            </header>
            <p class="mt-5">
                Welcome to our veterinary services appointment scheduling website, where we prioritize the health and
                well-being of your beloved pets. Our comprehensive range of services ensures that your furry friends
                receive the best care possible. Here's a brief description of our primary services available for
                appointment scheduling.
            </p>
            <div class="mt-10 grid grid-cols-4 gap-5">
                <a class="border bg-white hover:shadow-main shadow-sm hover:shadow-lg rounded-xl ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/checkup.jpg') }}" class="h-56 object-cover rounded-xl m-2"
                            alt="">
                        <div class="p-3">
                            <p class="font-semibold text-main mt-5 text-lg text-center">
                                GENERAL CHECK-UPS
                            </p>
                            <p class="text-justify text-xs px-2">
                                Ensure your pet's overall health with our thorough general check-up service. Our
                                experienced veterinarians will assess your pet's vital signs, conduct a physical
                                examination, and address any concerns or questions you may have about your pet's
                                well-being.
                            </p>
                        </div>
                    </div>
                </a>
                <a class="border bg-white hover:shadow-main shadow-sm hover:shadow-lg rounded-xl ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/grooming.jpg') }}" class="h-56 object-cover rounded-xl m-2"
                            alt="">
                        <div class="p-3">
                            <p class="font-semibold text-main mt-5 text-lg text-center">
                                GROOMING
                            </p>
                            <p class="text-justify text-xs px-2">
                                Treat your pets to a pampering session with our professional grooming services. From a
                                relaxing bath to nail trimming and coat styling, our skilled groomers will keep your
                                pets looking and feeling their best.
                            </p>
                        </div>
                    </div>
                </a>
                <a class="border bg-white hover:shadow-main shadow-sm hover:shadow-lg rounded-xl ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/deworming.png') }}" class="h-56 object-cover rounded-xl m-2"
                            alt="">
                        <div class="p-3">
                            <p class="font-semibold text-main mt-5 text-lg text-center">
                                DEWORMING
                            </p>
                            <p class="text-justify text-xs px-2">
                                Safeguard your pets against internal parasites with our deworming service. Regular
                                deworming is essential for maintaining your pet's health and preventing the potential
                                spread of parasites.
                            </p>
                        </div>
                    </div>
                </a>
                <a class="border bg-white hover:shadow-main shadow-sm hover:shadow-lg rounded-xl ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/vaccination.png') }}" class="h-56 object-cover rounded-xl m-2"
                            alt="">
                        <div class="p-3">
                            <p class="font-semibold text-main mt-5 text-lg text-center">
                                VACCINATION
                            </p>
                            <p class="text-justify text-xs px-2">
                                Stay ahead of preventable diseases by scheduling vaccinations for your pets. Our
                                veterinarians will recommend a tailored vaccination schedule to ensure your pet is
                                protected against common illnesses, promoting a long and healthy life.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-5 mb-20 bg-white ">
            <p class="text-justify ">
                Our user-friendly appointment scheduling system allows you to conveniently book these services for your
                pets. Simply select the desired service, choose a suitable time slot, and rest assured that your pets
                are in capable and caring hands. At our veterinary clinic, we are committed to fostering a positive and
                comfortable experience for both pets and their owners. Book your appointment today and let us be a part
                of your pet's journey to optimal health and happiness
            </p>
        </div>
    </section>





    <footer class="relative bg-gray-800 mt-10" aria-labelledby="footer-heading">
        <img src="{{ asset('images/footer-bg.jpg') }}"
            class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0" alt="">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="px-5 py-3 mx-auto max-w-7xl lg:py-3 md:px-12 lg:px-20 relative">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="xl:col-span-1">
                    <a href="/"
                        class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform text-black tracking-relaxed lg:pr-8">
                        <img src="{{ asset('images/newlogo.png') }}" class="" alt="">
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 mt-2 xl:mt-0 xl:col-span-2">

                </div>
            </div>
        </div>
        <div
            class="px-5 py-3 mx-auto border-t max-w-7xl sm:px-6 md:flex md:items-center md:justify-center lg:px-20 relative">

            <div class="mt-8 md:mt-0 md:order-1">
                <span class="mt-2 text-sm font-light text-white">
                    Copyright © 2023 - 2024
                    <a href="#" class="mx-2 text-wickedblue hover:text-gray-500"
                        rel="noopener noreferrer">@PetHeart</a>. Since 2023
                </span>
            </div>
        </div>
    </footer>


</body>

</html>
