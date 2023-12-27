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

    <section>
        <div class="flex flex-col justify-center flex-1 ">
            <div>
                <div class="relative overflow-hidden">
                    <div class="mx-auto">
                        <div class="relative overflow-hidden shadow-xl">
                            <div class="absolute inset-0">
                                <img class="object-cover w-full h-full opacity-90"
                                    src="{{ asset('images/bg-dashboard.jpg') }}" alt="">
                                <div class="absolute inset-0 bg-gray-800 mix-blend-multiply"></div>
                            </div>
                            <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-52 lg:px-8">
                                <div class="max-w-2xl p-10 mx-auto text-center">
                                    <div>
                                        <p
                                            class="2xl:text-6xl animate__animated animate__slideInDown  text-4xl tracking-tight font-black text-white">
                                            Excellent Pet deserves Excellent Care
                                        </p>
                                        <p
                                            class="max-w-xl mt-4 animate__animated animate__fadeIn 2xl:text-xl text-sm tracking-tight text-gray-100">
                                            We offer a warm and welcoming environment where your pet's comfort comes
                                            first. Our state-of-the-art facilities are designed to ensure a stress-free
                                            experience for both you and your furry friend.
                                        </p>

                                    </div>

                                    <button onclick="window.location.href='{{ route('login') }}'"
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

    <section id="contacts" class="relative flex items-center w-full">
        <div class="relative items-center w-full px-5 pt-24 pb-10 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <div class="relative flex-col items-start m-auto align-middle">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-24">
                    <div class="relative items-center gap-12 m-auto lg:inline-flex">
                        <div class="max-w-xl text-center lg:text-left">
                            <div>

                                <p class="text-6xl font-black tracking-tight text-black sm:text-5xl">
                                    <span>Welcome to</span>
                                <h1 class="font-bold text-gray-600">OUR VETERENARY CLINIC</h1>
                                </p>

                                <p class="max-w-xl mt-4 text-lg  text-gray-600">
                                    Welcome to our veterinary clinic appointment scheduling website, where we prioritize
                                    the health and well-being of your beloved pets.
                                </p>
                            </div>
                            <div class="flex justify-center gap-3 mt-10 lg:justify-start">

                            </div>
                        </div>
                    </div>
                    <div class="order-first block w-full mt-12 aspect-square lg:mt-0 lg:order-first">
                        <div class="bg-gray-200 rounded-xl shadow shadow-blue-700 relative w-full p-12">
                            <h1 class="font-bold text-xl text-gray-700">OFFICE HOURS & LOCATIONS:</h1>

                            <div class="mt-10">
                                <div class="flex items-center space-x-3">
                                    <div class="grid place-content-center rounded-full bg-blue-500 p-4 fill-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                                            <path
                                                d="M6 4H4V2H20V4H18V6C18 7.61543 17.1838 8.91468 16.1561 9.97667C15.4532 10.703 14.598 11.372 13.7309 12C14.598 12.628 15.4532 13.297 16.1561 14.0233C17.1838 15.0853 18 16.3846 18 18V20H20V22H4V20H6V18C6 16.3846 6.81616 15.0853 7.8439 14.0233C8.54682 13.297 9.40202 12.628 10.2691 12C9.40202 11.372 8.54682 10.703 7.8439 9.97667C6.81616 8.91468 6 7.61543 6 6V4ZM8 4V6C8 6.68514 8.26026 7.33499 8.77131 8H15.2287C15.7397 7.33499 16 6.68514 16 6V4H8ZM12 13.2219C10.9548 13.9602 10.008 14.663 9.2811 15.4142C9.09008 15.6116 8.92007 15.8064 8.77131 16H15.2287C15.0799 15.8064 14.9099 15.6116 14.7189 15.4142C13.992 14.663 13.0452 13.9602 12 13.2219Z">
                                            </path>
                                        </svg>

                                    </div>
                                    <div>
                                        <p class="text-gray-700">Mon-Sun 8:30am - 8:00pm</p>
                                    </div>
                                </div>
                                <div class="flex mt-3 items-center space-x-3">
                                    <div class="grid place-content-center rounded-full bg-blue-500 p-4 fill-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                                            <path
                                                d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z">
                                            </path>
                                        </svg>

                                    </div>
                                    <div>
                                        <p class="text-gray-700">Phone: 09153457697</p>
                                    </div>
                                </div>
                                <div class="flex mt-3 items-center space-x-3">
                                    <div class="grid place-content-center rounded-full bg-blue-500 p-4 fill-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                                            <path
                                                d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
                                            </path>
                                        </svg>

                                    </div>
                                    <div>
                                        <p class="text-gray-700">
                                            Nepo Mall, Ground floor, Arellano street, Pantal, Dagupan City, Pangasinan
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('images/cats.png') }}" class="-bottom-40 absolute -right-28"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section -->




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
