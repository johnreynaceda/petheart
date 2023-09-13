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
            <circle r="90" cx="405.6" cy="373.24" stroke="#037b0b" stroke-width="1"
                stroke-dasharray="2, 2"></circle>
            <rect width="140" height="140" clip-path="url(&quot;#SvgjsClipPath19890&quot;)" x="1249.84"
                y="808.71" fill="url(&quot;#SvgjsPattern19891&quot;)" transform="rotate(65.68, 1319.84, 878.71)">
            </rect>
            <rect width="267.52" height="267.52" clip-path="url(&quot;#SvgjsClipPath19892&quot;)" x="1424"
                y="-96.65" fill="url(&quot;#SvgjsPattern19893&quot;)" transform="rotate(25.62, 1557.76, 37.11)">
            </rect>
            <rect width="504" height="504" clip-path="url(&quot;#SvgjsClipPath19894&quot;)" x="591.26"
                y="462.74" fill="url(&quot;#SvgjsPattern19895&quot;)" transform="rotate(324.04, 843.26, 714.74)">
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
            <pattern x="0" y="0" width="140" height="14" patternUnits="userSpaceOnUse"
                id="SvgjsPattern19891">
                <rect width="140" height="7" x="0" y="0" fill="#037b0b"></rect>
                <rect width="140" height="7" x="0" y="7" fill="rgba(0, 0, 0, 0)"></rect>
            </pattern>
            <clipPath id="SvgjsClipPath19890">
                <circle r="35" cx="1319.84" cy="878.71"></circle>
            </clipPath>
            <pattern x="0" y="0" width="12.16" height="12.16" patternUnits="userSpaceOnUse"
                id="SvgjsPattern19893">
                <path d="M0 12.16L6.08 0L12.16 12.16" stroke="#e73635" fill="none"></path>
            </pattern>
            <clipPath id="SvgjsClipPath19892">
                <circle r="66.88" cx="1557.76" cy="37.11"></circle>
            </clipPath>
            <pattern x="0" y="0" width="6" height="6" patternUnits="userSpaceOnUse"
                id="SvgjsPattern19895">
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
                class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
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
                        href="#">
                        Home
                    </a>
                    <a class="px-2 py-2 font-medium  text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                        href="#">
                        Services
                    </a>
                    <a class="px-2 py-2 font-medium  text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                        href="#">
                        Contacts
                    </a>
                    <a class="px-2 py-2  font-medium text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                        href="#">
                        Appointments
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
                                    src="https://images.unsplash.com/photo-1596272875729-ed2ff7d6d9c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                    alt="">
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

    <section class="relative flex items-center w-full">
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, optio!
                                </p>
                                <p class="max-w-xl mt-4 text-lg  text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium voluptas ratione
                                    dolores, illum necessitatibus et itaque numquam atque quasi minus.
                                </p>
                            </div>
                            <div class="flex justify-center gap-3 mt-10 lg:justify-start">
                                <a class="inline-flex items-center justify-center font-semibold text-blue-700 duration-200 hover:text-blue-500 focus:outline-none focus-visible:outline-gray-600"
                                    href="#">
                                    <span> Read more &nbsp; → </span>
                                </a>
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
                                        <p class="text-gray-700">Monday-Friday: 7:30am – 9:30pm </p>
                                        <p class="text-gray-700">Saturday-Sunday: 10:00am - 6:00pm</p>
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
                                        <p class="text-gray-700">Phone: 091234567890</p>
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
                                            Prk. San Jose, Antipolo City, Rizal
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('images/cats.png') }}" class="-bottom-40 absolute -right-20"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section -->
    <div class="relative z-10 mt-32 bg-gray-900 pb-20 sm:mt-56 sm:pb-24 xl:pb-0">
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute left-[calc(50%-19rem)] top-[calc(50%-36rem)] transform-gpu blur-3xl">
                <div class="aspect-[1097/1023] w-[68.5625rem] bg-gradient-to-r from-[#ff4694] to-[#776fff] opacity-25"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
        <div
            class="mx-auto flex max-w-7xl flex-col items-center gap-x-8 gap-y-10 px-6 sm:gap-y-8 lg:px-8 xl:flex-row xl:items-stretch">
            <div class="-mt-8 w-full max-w-2xl xl:-mb-8 xl:w-96 xl:flex-none">
                <div class="relative aspect-[2/1] h-full md:-mx-8 xl:mx-0 xl:aspect-auto">
                    <img class="absolute inset-0 h-full w-full rounded-2xl bg-gray-800 object-cover shadow-2xl"
                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80"
                        alt="">
                </div>
            </div>
            <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:px-16 xl:py-24">
                <figure class="relative isolate pt-6 sm:pt-12">
                    <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                        class="absolute left-0 top-0 -z-10 h-32 stroke-white/20">
                        <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                            d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                        <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                    </svg>
                    <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
                        <p>Gravida quam mi erat tortor neque molestie. Auctor aliquet at porttitor a enim nunc suscipit
                            tincidunt nunc. Et non lorem tortor posuere. Nunc eu scelerisque interdum eget tellus non
                            nibh scelerisque bibendum.</p>
                    </blockquote>
                    <figcaption class="mt-8 text-base">
                        <div class="font-semibold text-white">Judith Black</div>
                        <div class="mt-1 text-gray-400">CEO of Tuple</div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>

    <section class="relative">

        <div class="items-center  w-full px-5 pt-40 pb-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <center class="py-10 space-y-3 flex flex-col">
                <h1 class="text-6xl font-black text-gray-700 ">Meet Our Team</h1>
                <span class="text-lg uppercase text-gray-500">Seasoned and skilled staff </span>
            </center>

            <ul role="list"
                class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
                <li>
                    <div class="space-y-4">
                        <div class="aspect-[3/2]">
                            <img class="object-cover w-full h-full"
                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                alt="">
                        </div>
                        <div class="inline-flex items-start justify-between w-full ">
                            <div class="space-y-1">
                                <h3 class="text-lg font-medium leading-6 text-black">
                                    Annur Flint
                                </h3>
                                <p class="text-base text-gray-500">
                                    CEO at Flint LLC
                                </p>
                            </div>
                            <div>
                                <ul role="list" class="flex space-x-5">
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <ion-icon name="logo-dribbble" role="img" class="md hydrated"
                                                aria-label="logo dribbble"></ion-icon>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">
                                                Twitter
                                            </span>
                                            <ion-icon name="logo-twitter" role="img" class="md hydrated"
                                                aria-label="logo twitter"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="space-y-4">
                        <div class="aspect-[3/2]">
                            <img class="object-cover w-full h-full"
                                src="https://images.unsplash.com/photo-1602434228300-a645bce6891b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1639&q=80"
                                alt="">
                        </div>
                        <div class="inline-flex items-start justify-between w-full ">
                            <div class="space-y-1">
                                <h3 class="text-lg font-medium leading-6 text-black">
                                    Melonia Tusk
                                </h3>
                                <p class="text-base text-gray-500">
                                    Founder of Fesla
                                </p>
                            </div>
                            <div>
                                <ul role="list" class="flex space-x-5">
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <ion-icon name="logo-dribbble" role="img" class="md hydrated"
                                                aria-label="logo dribbble"></ion-icon>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">
                                                Twitter
                                            </span>
                                            <ion-icon name="logo-twitter" role="img" class="md hydrated"
                                                aria-label="logo twitter"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="space-y-4">
                        <div class="aspect-[3/2]">
                            <img class="object-cover w-full h-full"
                                src="https://images.unsplash.com/photo-1577202214328-c04b77cefb5d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2073&q=80"
                                alt="">
                        </div>
                        <div class="inline-flex items-start justify-between w-full ">
                            <div class="space-y-1">
                                <h3 class="text-lg font-medium leading-6 text-black">
                                    Jordan Pettersson
                                </h3>
                                <p class="text-base text-gray-500">
                                    Director at Pettersson Industries
                                </p>
                            </div>
                            <div>
                                <ul role="list" class="flex space-x-5">
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <ion-icon name="logo-dribbble" role="img" class="md hydrated"
                                                aria-label="logo dribbble"></ion-icon>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">
                                                Twitter
                                            </span>
                                            <ion-icon name="logo-twitter" role="img" class="md hydrated"
                                                aria-label="logo twitter"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- More people... -->
            </ul>
        </div>
    </section>

    <section class="bg-gray-100 relative">
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-20 max-w-7xl">
            <ol class="relative grid grid-cols-1 gap-3 lg:grid-cols-2 sm:grid-cols-2" role="list">
                <li class="space-y-3 px-3 py-2.5 lg:px-6 lg:py-5  bg-white">
                    <a class="group" href="#">
                        <div>
                            <div class="py-3">
                                <div class="flex-shrink-0 block">
                                    <div class="flex items-center">
                                        <div>
                                            <img alt="" class="inline-block object-cover rounded-xl h-9 w-9"
                                                src="https://images.unsplash.com/photo-1602434228300-a645bce6891b?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1639&amp;q=80">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-black group-hover:text-blue-500">
                                                Mikaela Andreuzza
                                                <span class="text-gray-500">
                                                    in
                                                </span>
                                                Investiments ·
                                                <span class="text-gray-500">
                                                    4 days ago
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-8 text-lg font-medium leading-6 text-black">
                                The Hidden Danger of QR Codes
                            </h3>
                        </div>
                        <p class="mt-5 text-base text-gray-500 line-clamp-3">
                            In this article, I will be referring to various amazing Authors and
                            resources I strongly recommend that you separately study them on
                            your own. The references list is at the end of the article, enjoy
                            reading! I will be referring to various amazing. In this article, I
                            will.
                        </p>
                        <div class="py-3">
                            <div>
                                <div class="inline-flex items-center justify-between w-full">
                                    <div>
                                        <p class="text-sm text-black group-hover:text-blue-500">
                                            Investiments
                                            <span class="text-gray-500">
                                                ·
                                            </span>
                                            10 min
                                            read
                                        </p>
                                    </div>
                                    <div>
                                        <span>
                                            <ion-icon name="bookmark-outline"
                                                class="w-5 text-blue-500 group-hover:text-black md hydrated"
                                                role="img" aria-label="bookmark outline"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="space-y-3 px-3 py-2.5 lg:px-6 lg:py-5  bg-white">
                    <a class="group" href="#">
                        <div>
                            <div class="py-3">
                                <div class="flex-shrink-0 block">
                                    <div class="flex items-center">
                                        <div>
                                            <img alt="" class="inline-block object-cover rounded-xl h-9 w-9"
                                                src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=989&amp;q=80">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-black group-hover:text-blue-500">
                                                Ulaffson
                                                <span class="text-gray-500">
                                                    in
                                                </span>
                                                Investiments ·
                                                <span class="text-gray-500">
                                                    4 days ago
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-8 text-lg font-medium leading-6 text-black">
                                Metamask - Is It Really A Wallet?
                            </h3>
                        </div>
                        <p class="mt-5 text-base text-gray-500 line-clamp-3">
                            Each of us lives our own life. Everyday routines, people we meet,
                            things we experience, the music we listen to, the food we eat, the
                            culture that surrounds us, or even the way our apartment is set up.
                            Every little detail impacts our lives in some way.
                        </p>
                        <div class="py-3">
                            <div>
                                <div class="inline-flex items-center justify-between w-full">
                                    <div>
                                        <p class="text-sm text-black group-hover:text-blue-500">
                                            Investiments
                                            <span class="text-gray-500">
                                                ·
                                            </span>
                                            10 min
                                            read
                                        </p>
                                    </div>
                                    <div>
                                        <span>
                                            <ion-icon name="bookmark-outline"
                                                class="w-5 text-blue-500 group-hover:text-black md hydrated"
                                                role="img" aria-label="bookmark outline"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ol>
        </div>
    </section>

    <footer class="relative bg-gray-800" aria-labelledby="footer-heading">
        <img src="https://images.unsplash.com/photo-1510563800743-aed236490d08?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0" alt="">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="px-5 py-12 mx-auto max-w-7xl lg:py-16 md:px-12 lg:px-20 relative">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="xl:col-span-1">
                    <a href="/"
                        class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform text-black tracking-relaxed lg:pr-8">
                        <img src="{{ asset('images/logo.png') }}" class="bg-white p-2 rounded-xl bg-opacity-50"
                            alt="">
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="font-semibold leading-6 uppercase text-white">
                                Solutions
                            </h3>
                            <ul role="list" class="mt-4 space-y-3">
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Marketing
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Analytics
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Commerce
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Insights
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="font-semibold leading-6 uppercase text-white">
                                Support
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Pricing
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Alpine.js
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        Guides
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-white hover:text-blue-600">
                                        API Status
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden lg:justify-end md:grid md:grid-cols-1">
                        <div class="w-full mt-12 md:mt-0">
                            <div class="mt-8 lg:justify-end xl:mt-0">
                                <h3 class="font-semibold leading-6 uppercase text-white">
                                    Subscribe to our newsletter
                                </h3>
                                <p class="mt-4 text-sm font-light text-gray-200 lg:ml-auto">
                                    The latest news, articles, and resources, sent to your inbox
                                    weekly.
                                </p>
                                <div class="inline-flex items-center gap-2 mt-12 list-none lg:ml-auto">
                                    <form class="flex flex-col items-center justify-center max-w-sm mx-auto"
                                        action="">
                                        <div class="flex flex-col w-full gap-1 mt-3 sm:flex-row">
                                            <input name="email" type="email"
                                                class="block w-full px-4 py-2 text-sm font-medium text-gray-800 placeholder-gray-400 bg-white border border-gray-300 rounded-full font-spline focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50 disabled:opacity-50"
                                                placeholder="Enter your email..." required=""><button
                                                type="button"
                                                class="items-center inline-flex  justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-black border-2 border-black rounded-full nline-flex hover:bg-transparent hover:border-black hover:text-black focus:outline-none lg:w-auto focus-visible:outline-black text-sm focus-visible:ring-black">
                                                <div style="position: relative"></div>
                                                Subscribe<!-- -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" class="w-4 h-auto ml-2">
                                                    <path fill-rule="evenodd"
                                                        d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="px-5 py-12 mx-auto border-t max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-20 relative">

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
