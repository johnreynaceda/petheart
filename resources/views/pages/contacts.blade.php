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
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative">

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



    <div class=" relative bg-gray-700">
        <img src="{{ asset('images/bg-contact.jpg') }}" class="absolute object-cover h-full opacity-20 w-full"
            alt="">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 relative lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-2xl lg:max-w-5xl mx-auto">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-white sm:text-4xl dark:text-white">
                        Contact us
                    </h1>
                    <p class="mt-1 text-gray-100 dark:text-gray-400">
                        We'd love to talk about how we can help you.
                    </p>
                </div>

                <div class="mt-12 grid items-center lg:grid-cols-2 gap-6 lg:gap-16">
                    <!-- Card -->
                    <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-gray-700">
                        <h2 class="mb-8 text-xl font-semibold text-white dark:text-gray-200">
                            Fill in the form
                        </h2>

                        <livewire:contact />
                    </div>
                    <!-- End Card -->

                    <div class="divide-y divide-gray-200 dark:divide-gray-800">
                        <!-- Icon Block -->
                        <div class="flex gap-x-7 py-6">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-shrink-0 w-6 h-6 mt-1.5 text-white dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path
                                    d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"
                                    fill="currentColor"></path>
                            </svg>
                            <div class="grow">
                                <h3 class="font-semibold text-white dark:text-gray-200">Contact Us</h3>
                                <p class="mt-1 text-sm text-white">

                                    Phone: 09153457697

                                </p>

                            </div>
                        </div>
                        <!-- End Icon Block -->

                        <!-- Icon Block -->
                        <div class="flex gap-x-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-shrink-0 w-6 h-6 mt-1.5 text-white dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path
                                    d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"
                                    fill="currentColor"></path>
                            </svg>
                            <div class="grow">
                                <h3 class="font-semibold text-white dark:text-gray-200">Location</h3>
                                <p class="mt-1 text-sm text-white">
                                    Nepo Mall, Ground floor, Arellano street, Pantal, Dagupan City, Pangasinan
                                </p>

                            </div>
                        </div>
                        <!-- End Icon Block -->

                        <!-- Icon Block -->
                        <div class=" flex gap-x-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-shrink-0 w-6 h-6 mt-1.5 text-white dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path
                                    d="M7 1V3H3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H10.7546C9.65672 19.6304 9 17.8919 9 16C9 11.5817 12.5817 8 17 8C18.8919 8 20.6304 8.65672 22 9.75463V4C22 3.44772 21.5523 3 21 3H17V1H15V3H9V1H7ZM23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16ZM16 12V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V12H16Z"
                                    fill="currentColor"></path>
                            </svg>
                            <div class="grow">
                                <h3 class="font-semibold text-white dark:text-gray-200">Business Hour</h3>
                                <p class="mt-1 text-sm text-white">Mon-Sun 8:30am - 8:00pm</p>

                            </div>
                        </div>
                        <!-- End Icon Block -->

                        <!-- Icon Block -->

                        <!-- End Icon Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Us -->
    </div>





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
