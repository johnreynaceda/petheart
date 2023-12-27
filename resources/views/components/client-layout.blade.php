<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/newlogo.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative bg-white">
    <div class="fixed top-0 bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-0 left-0 bottom-0 h-full w-full opacity-20"
            version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs"
            width="1440" height="800" preserveAspectRatio="none" viewBox="0 0 1440 800">
            <g mask="url(&quot;#SvgjsMask1005&quot;)" fill="none">
                <path
                    d="M0 39.29C3.49 15.83 7.29 4.41 29.73 0C107.29 -15.24 114.87 0 200 0C300 0 300 0 400 0C481.48 0 488.16 -15.16 562.96 0C588.16 5.11 579.71 40.54 600 40.54C624.55 40.54 621.56 6.3 652.63 0C721.56 -13.97 726.32 0 800 0C900 0 900 0 1000 0C1050.98 0 1064.47 -26.03 1101.96 0C1164.47 43.41 1157.33 138.89 1200 138.89C1238.4 138.89 1211.15 36.77 1264.1 0C1311.15 -32.67 1332.05 0 1400 0C1468.83 0 1483.41 -26.57 1537.66 0C1583.41 22.41 1583.41 44.73 1600 97.96C1614.58 144.73 1600 148.98 1600 200C1600 300 1600 300 1600 400C1600 481.48 1618.6 491.04 1600 562.96C1592.74 591.04 1548.28 575.98 1548.28 600C1548.28 638.62 1587.64 640.45 1600 688.24C1613.5 740.45 1635.18 779.3 1600 800C1540.18 835.18 1504.53 802.15 1410 800C1404.53 799.88 1404.43 795.45 1400 795.45C1397.7 795.45 1399.37 799.94 1396.55 800C1299.37 802.21 1298.28 800 1200 800C1113.64 800 1049.67 844.8 1027.27 800C999.67 744.8 1109.25 671.99 1100 600C1095.62 565.93 1049.55 596.69 1000 587.88C899.55 570.02 891.21 542.15 800 546.67C768.99 548.21 755.56 576.15 755.56 600C755.56 618.81 779.79 613.58 800 632C889.51 713.58 975 751.2 975 800C975 835.2 887.5 800 800 800C700 800 700 800 600 800C500 800 500 800 400 800C300 800 300 800 200 800C112.5 800 106.29 812.84 25 800C6.29 797.05 2.41 787.72 0 768.42C-10.09 687.72 0 684.21 0 600C0 500 0 500 0 400C0 300 0 300 0 200C0 119.64 -11.38 115.83 0 39.29"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M800 182.61C793.58 182.61 787.3 190.99 787.3 200C787.3 210.49 793.57 221.62 800 221.62C806.48 221.62 813.11 210.48 813.11 200C813.11 190.97 806.49 182.61 800 182.61"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M400 350C351.11 350 287.5 380.46 287.5 400C287.5 418.32 346.63 425.71 400 425.71C419.25 425.71 432.73 415.54 432.73 400C432.73 377.69 423.73 350 400 350"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M0 128.57C33.71 59.27 36.21 39.27 97.3 0C136.21 -25.01 148.65 0 200 0C300 0 300 0 400 0C450.62 0 460.36 -22.09 501.23 0C560.36 31.96 547.48 57.3 600 108.11C650.84 157.3 664.13 145.53 707.94 200C764.13 269.85 753.41 356.76 800 356.76C846.98 356.76 895.08 275.98 895.08 200C895.08 134.55 848.31 136.35 800 73.91C770.94 36.35 740.35 22.7 740.35 0C740.35 -14.26 770.17 0 800 0C900 0 900 0 1000 0C1001.96 0 1002.81 -1.6 1003.92 0C1072.37 98.4 1067.77 102.95 1139.13 200C1165.81 236.29 1159.71 260.71 1200 266.67C1290.14 280.01 1300.43 255.2 1400 238.6C1500.43 221.86 1549.54 159.28 1600 200C1649.54 239.98 1600 300 1600 400C1600 450.62 1625.77 463.86 1600 501.23C1556.81 563.86 1524.36 543.75 1462.07 600C1424.36 634.05 1431.04 640.91 1400 681.82C1355.17 740.91 1367.69 766.11 1310.34 800C1267.69 825.2 1255.17 800 1200 800C1151.51 800 1103.03 823.25 1103.03 800C1103.03 762.87 1145.08 732.92 1200 679.25C1247.41 632.92 1307.69 640.64 1307.69 600C1307.69 558.16 1262.71 532.2 1200 514.29C1108.87 488.26 1096.59 531.13 1000 512.12C896.59 491.77 884.28 413.59 800 435.56C715.76 457.53 662.96 526.46 662.96 600C662.96 658.01 735.01 645.09 800 698.67C856.31 745.09 905.56 770.57 905.56 800C905.56 821.23 852.78 800 800 800C700 800 700 800 600 800C507.85 800 503.57 808.79 415.69 800C403.57 798.79 409.99 780 400 780C383.09 780 382.9 797.9 361.9 800C282.9 807.9 280.95 800 200 800C164.58 800 154.56 820.72 129.17 800C54.56 739.14 54.87 721.8 0 636.84C-9.71 621.8 0 618.42 0 600C0 561.11 -27.23 540.54 0 522.22C72.77 473.26 98.68 471.8 200 465.45C298.68 459.26 308.91 515.56 400 497.14C470.73 482.84 523.64 458.71 523.64 400C523.64 315.7 481.21 233.14 400 211.11C319.39 189.24 305.51 281.1 200 312.2C105.51 340.06 60.87 363.18 0 329.03C-39.13 307.08 0 264.51 0 200C0 164.28 -14.94 159.27 0 128.57"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M1400 143.59C1363.92 143.59 1328.21 49.61 1328.21 0C1328.21 -22.19 1364.11 0 1400 0C1436.36 0 1472.73 -22.34 1472.73 0C1472.73 49.45 1436.18 143.59 1400 143.59"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M200 173.33C147.59 155.04 164.86 72.3 164.86 0C164.86 -14.37 182.43 0 200 0C300 0 300 0 400 0C419.75 0 439.51 -12.41 439.51 0C439.51 28.61 435.08 56.67 400 82.05C315.32 143.33 265.16 196.07 200 173.33"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M543.75 200C543.75 176.33 573.69 175.68 600 175.68C616.1 175.68 628.57 182.93 628.57 200C628.57 264.32 620.62 338.46 600 338.46C578.21 338.46 543.75 257.72 543.75 200"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M977.05 200C985.13 176.06 987.14 154.84 1000 154.84C1013.83 154.84 1012.63 179.45 1030.43 200C1112.63 294.89 1099 351.19 1200 385.71C1283.79 414.35 1297.9 342.59 1400 326.32C1497.9 310.71 1528.07 295.45 1600 321.95C1628.07 332.29 1600 360.98 1600 400C1600 419.75 1614.74 428.45 1600 439.51C1514.74 503.45 1496.95 556.61 1400 550C1296.95 542.97 1309.32 443.3 1200 412.24C1109.32 386.48 1097.59 440.58 1000 436.36C956.21 434.46 920.71 435.71 917.24 400C909.23 317.53 943.75 298.64 977.05 200"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M1400 15.38C1396.14 15.38 1392.31 5.31 1392.31 0C1392.31 -2.38 1396.15 0 1400 0C1403.89 0 1407.79 -2.39 1407.79 0C1407.79 5.3 1403.88 15.38 1400 15.38"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M120 600C120 568.32 156.23 561.27 200 556.36C296.23 545.56 301.24 554.92 400 568.57C459.14 576.74 515.79 579.11 515.79 600C515.79 622.32 459.8 632.28 400 655C301.9 692.28 283.05 736.31 200 720C143.05 708.81 120 650.14 120 600"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M513.73 800C513.73 751.34 539.02 660.72 600 653.33C682.15 643.38 703.11 705.14 800 765.33C821.16 778.47 836.11 789.93 836.11 800C836.11 807.26 818.06 800 800 800C700 800 700 800 600 800C556.87 800 513.73 824.67 513.73 800"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
                <path
                    d="M1178.79 800C1178.79 791.88 1188.97 773.58 1200 773.58C1211.65 773.58 1224.14 792.11 1224.14 800C1224.14 805.32 1212.07 800 1200 800C1189.39 800 1178.79 805.09 1178.79 800"
                    stroke="rgba(16, 118, 225, 0.58)" stroke-width="2"></path>
            </g>
            <defs>
                <mask id="SvgjsMask1005">
                    <rect width="1440" height="800" fill="#ffffff"></rect>
                </mask>
            </defs>
        </svg>
    </div>
    <div class="">
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
                            href="{{ route('client.dashboard') }}">
                            Home
                        </a>
                        <a class="px-2 py-2 font-medium  text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                            href="{{ route('client.pets') }}">
                            My Pets
                        </a>
                        <a class="px-2 py-2  font-medium text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                            href="{{ route('client.appointments') }}">
                            Appointments
                        </a>
                        <a class="px-2 py-2  font-medium text-gray-500 lg:px-6 md:px-3 hover:text-blue-700"
                            href="{{ route('client.billing') }}">
                            Billing
                        </a>

                        <div class="inline-flex items-center gap-3 list-none lg:ml-auto">
                            <livewire:notif />
                            <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                                <div>

                                    <button @click="open = !open" type="button"
                                        class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">
                                            Open user menu
                                        </span>
                                        @if (auth()->user()->profile_path == null)
                                            <img class="object-cover w-10 h-10 rounded-full"
                                                src="{{ asset('images/sample.png') }}" alt="">
                                        @else
                                            <img class="object-cover w-10 h-10 rounded-full"
                                                src="{{ Storage::url(auth()->user()->profile_path) }}"
                                                alt="">
                                        @endif
                                    </button>
                                </div>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95" style="display: none"
                                    class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0">
                                        Your Profile
                                    </a>


                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                            tabindex="-1" id="user-menu-item-2">
                                            Sign out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        {{-- <div class="w-full mx-auto 2xl:max-w-7xl px-2 py-14">
            <header class="2xl:text-4xl text-3xl text-gray-700 uppercase font-bold">
                @yield('title')
            </header>
            <div class="2xl:mt-10 mt-5">
                {{ $slot }}
            </div>
        </div> --}}

        <div>
            {{ $slot }}
        </div>

        @if (Route::is('client.dashboard'))
            <footer class="relative bg-gray-800 " aria-labelledby="footer-heading">
                <img src="{{ asset('images/footer-bg.jpg') }}"
                    class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0"
                    alt="">
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
        @endif
        @if (Route::is('client.pets'))
            <footer class="relative bg-gray-800 mt-40" aria-labelledby="footer-heading">
                <img src="{{ asset('images/footer-bg.jpg') }}"
                    class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0"
                    alt="">
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
        @endif
        @if (Route::is('client.appointments'))
            <footer class="relative bg-gray-800 mt-56" aria-labelledby="footer-heading">
                <img src="{{ asset('images/footer-bg.jpg') }}"
                    class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0"
                    alt="">
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
        @endif
        @if (Route::is('client.billing'))
            <footer class="relative bg-gray-800 mt-72" aria-labelledby="footer-heading">
                <img src="{{ asset('images/footer-bg.jpg') }}"
                    class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-40 right-0"
                    alt="">
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
        @endif
    </div>
    @livewire('notifications')
</body>

</html>
