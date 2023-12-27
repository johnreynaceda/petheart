<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative">

    <div class="flex h-screen overflow-hidden bg-gray-200">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-gray-800 border-r overflow-x-hidden">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold flex justify-center tracking-tighter text-black focus:outline-none focus:ring "
                            href="/">
                            <img src="{{ asset('images/newlogo.png') }}" class="h-14" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <div @click="open = !open"
                            class="inline-flex items-center justify-between bg-gray-200  w-full px-4 py-3 text-lg font-medium text-center text-white transition duration-500 ease-in-out transform rounded-xl hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span>
                                <span class="flex-shrink-0 block group">
                                    <div class="flex items-center">
                                        <div>
                                            <img class="inline-block object-cover rounded-full h-9 w-9"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                                alt="">
                                        </div>
                                        <div class="ml-3 text-left">
                                            <p class="text-sm font-medium text-gray-800 group-hover:text-blue-500">
                                                {{ auth()->user()->name }}
                                            </p>
                                            <p class="text-xs font-medium text-gray-800 group-hover:text-blue-500">
                                                {{ auth()->user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                </span>
                            </span>
                            <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" xmlns="http://www.w3.org/2000/svg"
                                class="inline w-5 h-5 ml-4 text-black transition-transform duration-200 transform rotate-0"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <nav class="flex-1 space-y-1 ">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                Analytics
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 19.9997C21 20.552 20.5523 20.9997 20 20.9997H4C3.44772 20.9997 3 20.552 3 19.9997V9.48882C3 9.18023 3.14247 8.88893 3.38606 8.69947L11.3861 2.47725C11.7472 2.19639 12.2528 2.19639 12.6139 2.47725L20.6139 8.69947C20.8575 8.88893 21 9.18023 21 9.48882V19.9997ZM11 12.9997V18.9997H13V12.9997H11Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a class="{{ request()->routeIs('admin.consultation') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.consultation') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">g
                                            <path
                                                d="M20 2C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22H6C5.44772 22 5 21.5523 5 21V19H3V17H5V15H3V13H5V11H3V9H5V7H3V5H5V3C5 2.44772 5.44772 2 6 2H20ZM14 8H12V11H9V13H11.999L12 16H14L13.999 13H17V11H14V8Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Consultation
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-5 text-xs font-semibold text-gray-400 uppercase">
                                BASE
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.doctors') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.doctors') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M14.9571 15.564C17.6154 16.6219 19.5726 19.0639 19.9387 22H4.0625C4.42862 19.0639 6.38587 16.6219 9.04417 15.564L12.0006 20L14.9571 15.564ZM18.0006 2V8C18.0006 11.3137 15.3143 14 12.0006 14C8.6869 14 6.00061 11.3137 6.00061 8V2H18.0006ZM16.0006 8H8.00061C8.00061 10.2091 9.79147 12 12.0006 12C14.2098 12 16.0006 10.2091 16.0006 8Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Doctors
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.clients') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.clients') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M12.0009 17C15.6633 17 18.8659 18.5751 20.608 20.9247L18.766 21.796C17.3482 20.1157 14.8483 19 12.0009 19C9.15346 19 6.6535 20.1157 5.23577 21.796L3.39453 20.9238C5.13673 18.5747 8.33894 17 12.0009 17ZM12.0009 2C14.7623 2 17.0009 4.23858 17.0009 7V10C17.0009 12.7614 14.7623 15 12.0009 15C9.23945 15 7.00087 12.7614 7.00087 10V7C7.00087 4.23858 9.23945 2 12.0009 2Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Clients
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.animals') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.animals') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M5.92636 12.4965C7.98921 12.0535 7.70815 9.5883 7.64641 9.04949C7.54538 8.21882 6.56836 6.76688 5.24162 6.88173C3.57208 7.03154 3.32815 9.44324 3.32815 9.44324C3.10235 10.558 3.86869 12.9399 5.92636 12.4965ZM8.11701 16.7845C8.05656 16.9577 7.92186 17.4011 8.03843 17.787C8.26855 18.6531 9.02021 18.692 9.02021 18.692H10.1004V16.0514H8.94379C8.42397 16.2064 8.17313 16.611 8.11701 16.7845ZM9.75503 8.36259C10.8944 8.36259 11.8153 7.0514 11.8153 5.43022C11.8153 3.81076 10.8944 2.5 9.75503 2.5C8.61739 2.5 7.69433 3.81076 7.69433 5.43022C7.69433 7.0514 8.61783 8.36259 9.75503 8.36259ZM14.6622 8.55644C16.1849 8.75418 17.1641 7.12911 17.3588 5.89736C17.5574 4.66733 16.5748 3.23871 15.4967 2.99305C14.4165 2.74523 13.0678 4.47564 12.9447 5.60378C12.7979 6.98275 13.142 8.36087 14.6622 8.55644ZM14.6617 12.0039C12.7975 9.09914 10.1492 10.2812 9.26328 11.7587C8.38123 13.2356 7.00657 14.1699 6.81143 14.4173C6.61326 14.6608 3.9654 16.0903 4.55343 18.701C5.14103 21.31 7.20561 21.2604 7.20561 21.2604C7.20561 21.2604 8.72706 21.4102 10.492 21.0152C12.2578 20.6236 13.778 21.1127 13.778 21.1127C13.778 21.1127 17.9024 22.4939 19.031 19.8352C20.1582 17.1757 18.3933 15.7967 18.3933 15.7967C18.3933 15.7967 16.0373 13.9739 14.6617 12.0039ZM8.65496 19.7536C7.49703 19.5226 7.03593 18.7325 6.97765 18.5978C6.92066 18.461 6.59167 17.8259 6.76566 16.7453C7.26605 15.1262 8.69295 15.0101 8.69295 15.0101H10.1203V13.2555L11.3361 13.2741V19.7536H8.65496ZM13.2448 19.735C12.0489 19.4268 11.9932 18.5771 11.9932 18.5771V15.1651L13.2448 15.1448V18.2114C13.3212 18.5387 13.7275 18.5978 13.7275 18.5978H14.9989V15.1651H16.3304V19.735H13.2448ZM20.6983 10.6249C20.6983 10.0356 20.2087 8.26113 18.3933 8.26113C16.5748 8.26113 16.3317 9.93585 16.3317 11.1197C16.3317 12.2495 16.4271 13.8267 18.686 13.7766C20.9457 13.7265 20.6983 11.2173 20.6983 10.6249Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Animals
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.services') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.services') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7ZM4 16V19H20V16H4ZM4 14H20V7H4V14ZM9 3V5H15V3H9ZM11 11H13V13H11V11Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Services
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4  text-xs font-semibold text-gray-400 uppercase">
                                OTHERS
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.appointment-list') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.appointment-list') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 2.44772 2.44772 2 3 2H17C17.5523 2 18 2.44772 18 3V15H22V19C22 20.6569 20.6569 22 19 22ZM18 17V19C18 19.5523 18.4477 20 19 20C19.5523 20 20 19.5523 20 19V17H18ZM16 20V4H4V19C4 19.5523 4.44772 20 5 20H16ZM6 7H14V9H6V7ZM6 11H14V13H6V11ZM6 15H11V17H6V15Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span class="ml-3">
                                            Appointments
                                        </span>
                                        <x-badge
                                            label="{{ \App\Models\ClientAppointment::where('status', 'pending')->count() }}"
                                            xs dark class="ml-3" />
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.calendar') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.calendar') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM6 15H8V17H6V15ZM10 11H18V13H10V11ZM10 15H15V17H10V15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Calendar
                                        </span>
                                        {{-- <x-badge
                                            label="{{ \App\Models\ClientAppointment::where('status', 'pending')->count() }}"
                                            xs dark class="ml-3" /> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.medicines') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="{{ route('admin.medicines') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M19.7786 4.22171C22.1217 6.56486 22.1217 10.3639 19.7786 12.707L17.6565 14.8276L12.7075 19.7781C10.3643 22.1212 6.56535 22.1212 4.2222 19.7781C1.87906 17.4349 1.87906 13.6359 4.2222 11.2928L11.2933 4.22171C13.6364 1.87857 17.4354 1.87857 19.7786 4.22171ZM14.8288 14.8283L9.17195 9.17146L5.63642 12.707C4.07432 14.2691 4.07432 16.8018 5.63642 18.3638C7.19851 19.9259 9.73117 19.9259 11.2933 18.3638L14.8288 14.8283Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Medicines
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.inventory') ? 'bg-gray-200 text-gray-800 fill-gray-800 scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href=" {{ route('admin.inventory') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M11 7V4C11 3.44772 11.4477 3 12 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H11ZM5 16V18H10V16H5ZM14 16V18H19V16H14ZM14 13V15H19V13H14ZM14 10V12H19V10H14ZM5 13V15H10V13H5Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Inventory
                                        </span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1  text-gray-200 fill-gray-200 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-200 hover:scale-95 hover:text-gray-800 hover:fill-gray-800"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M2.13225 13.6308C1.95018 12.5349 1.95619 11.434 2.13313 10.3695C3.23434 10.3963 4.22471 9.86798 4.60963 8.93871C4.99454 8.00944 4.66782 6.93557 3.87024 6.17581C4.49783 5.29798 5.27202 4.51528 6.17568 3.86911C6.93548 4.66716 8.00968 4.99416 8.9392 4.60914C9.86872 4.22412 10.3971 3.23332 10.37 2.13176C11.4659 1.94969 12.5668 1.9557 13.6313 2.13265C13.6045 3.23385 14.1329 4.22422 15.0621 4.60914C15.9914 4.99406 17.0653 4.66733 17.825 3.86975C18.7029 4.49734 19.4856 5.27153 20.1317 6.1752C19.3337 6.93499 19.0067 8.00919 19.3917 8.93871C19.7767 9.86823 20.7675 10.3966 21.8691 10.3695C22.0511 11.4654 22.0451 12.5663 21.8682 13.6308C20.767 13.6041 19.7766 14.1324 19.3917 15.0616C19.0068 15.9909 19.3335 17.0648 20.1311 17.8245C19.5035 18.7024 18.7293 19.4851 17.8256 20.1312C17.0658 19.3332 15.9916 19.0062 15.0621 19.3912C14.1326 19.7762 13.6043 20.767 13.6313 21.8686C12.5354 22.0507 11.4345 22.0447 10.37 21.8677C10.3968 20.7665 9.86847 19.7761 8.9392 19.3912C8.00993 19.0063 6.93605 19.333 6.1763 20.1306C5.29847 19.503 4.51577 18.7288 3.8696 17.8252C4.66765 17.0654 4.99465 15.9912 4.60963 15.0616C4.22461 14.1321 3.23381 13.6038 2.13225 13.6308ZM12.0007 15.0002C13.6575 15.0002 15.0007 13.657 15.0007 12.0002C15.0007 10.3433 13.6575 9.00018 12.0007 9.00018C10.3438 9.00018 9.00066 10.3433 9.00066 12.0002C9.00066 13.657 10.3438 15.0002 12.0007 15.0002Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Settings
                                        </span>
                                    </a>
                                </li> --}}
                            </ul>
                        </nav>
                        <div class="mb-2">
                            <div
                                class="flex flex-col items-start p-3 transition duration-150 ease-in-out bg-gray-100 relative rounded-lg">

                                <div>
                                    <p class="mt-2 text-base font-bold text-blue-700">
                                        PETHEART
                                    </p>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">
                                    Your trusted and reliable Veterinary Clinic.
                                </p>
                                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    class="absolute -top-20 -right-10 h-32" viewBox="0 0 786.29468 749.1971"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>friends</title>
                                    <ellipse cx="428.29468" cy="670.89024" rx="358" ry="40"
                                        fill="#3f3d56" />
                                    <path
                                        d="M812.69445,702.0311l6.17411,19.02315s29.736,30.72079,18.98128,39.04755-34.884-35.56837-34.884-35.56837l-4.447-21.47613Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ffb8b8" />
                                    <path
                                        d="M755.64734,554.79169l9-3s14,4,16,18,17,85,17,85,6,3,2,8,20,50,20,50l-19,9s-38-40-38-44,1-8,1-12-1-4,0-7a32.16669,32.16669,0,0,0,1-8l-7-16Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#fc0000" />
                                    <ellipse cx="90.41777" cy="363.49768" rx="90.41777" ry="184.48877"
                                        fill="#fc0000" />
                                    <path
                                        d="M296.44031,440.81268c4.51025-80.30664,13.59765-134.55127,13.689-135.08984l-1.97168-.334c-.09131.53907-9.19482,54.87061-13.7124,135.28077-4.16894,74.21386-5.1748,186.46679,13.71192,299.78613l1.97265-.32813C291.27527,627.00067,292.27869,514.91766,296.44031,440.81268Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                    <rect x="291.31649" y="423.24475" width="92.72517" height="2.00012"
                                        transform="translate(-367.08716 134.1508) rotate(-28.1569)" fill="#3f3d56" />
                                    <rect x="250.38166" y="399.80166" width="2.00012" height="92.72517"
                                        transform="translate(-467.45648 381.99296) rotate(-61.8584)" fill="#3f3d56" />
                                    <ellipse cx="304.56511" cy="252.45832" rx="123.72957" ry="252.45832"
                                        fill="#e6e6e6" />
                                    <path
                                        d="M509.91492,330.446c6.17285-109.91113,18.61084-184.15185,18.73584-184.88916l-1.97168-.334c-.125.73779-12.5791,75.06543-18.75928,185.08008-5.70459,101.53759-7.08057,255.11767,18.75879,410.15283l1.97266-.32813C502.84412,585.28387,504.21814,431.87469,509.91492,330.446Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                    <rect x="503.27009" y="306.80628" width="126.88732" height="2.00012"
                                        transform="translate(-285.03704 228.45225) rotate(-28.1571)" fill="#3f3d56" />
                                    <rect x="447.62287" y="274.35779" width="2.00012" height="126.88732"
                                        transform="translate(-267.69188 498.66399) rotate(-61.8584)" fill="#3f3d56" />
                                    <ellipse cx="201.49146" cy="508.96817" rx="46.22863" ry="94.32509"
                                        fill="#e6e6e6" />
                                    <path
                                        d="M408.30341,588.43341l.27362.5116,41.79785-22.37207-.94336-1.76368-41.041,21.967c2.27112-41.80139,6.91614-69.86267,7.00977-70.41522l-1.97168-.334c-.10223.60339-5.62122,33.92651-7.58014,82.1449L364.455,576.0163,363.5116,577.78,405.30945,600.152l.499-.9328c-1.56732,39.79736-.68884,89.55963,7.61969,139.41034l1.97266-.32813C406.3421,683.949,406.14258,629.69867,408.30341,588.43341Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                    <path
                                        d="M767.8838,459.86565c-16.07417-27.39543-47.87565-28.67218-47.87565-28.67218s-30.98872-3.9971-50.86779,37.72647c-18.52888,38.88981-44.1011,76.4387-4.11692,85.54252l7.2223-22.67357,4.47274,24.3616a155.1105,155.1105,0,0,0,17.10774.29491c42.81983-1.39444,83.59924.408,82.2862-15.09055C774.367,520.75175,783.35039,486.22553,767.8838,459.86565Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M655.84213,679.30051a61.23955,61.23955,0,0,1-1.94921,8.4635c-.95617,2.712-2.4324,5.22006-3.30667,7.96-2.78678,8.73379,1.07652,18.47175,7.24682,25.21311a40.722,40.722,0,0,0,19.88743,11.91139c5.56641,1.41209,11.35417,1.61532,17.09064,1.81153,15.88459.54331,32.17788,1.02938,47.22947-4.11969a81.7199,81.7199,0,0,0,13.72159-6.28756,10.2875,10.2875,0,0,0,3.56045-2.82771c1.148-1.64851,1.29485-3.78648,1.28483-5.801-.03378-6.79217-1.39894-13.5497-1.07481-20.33408.17953-3.75786.87679-7.51282.53357-11.25908a20.71019,20.71019,0,0,0-15.73776-17.89186c-4.2698-.92484-8.69846-.42089-13.04555.00071a329.78922,329.78922,0,0,1-33.95148,1.53123c-11.58212-.07457-23.09272-1.85786-34.61719-2.04411-3.40812-.05507-3.33927,1.00471-4.42429,4.33169A81.60486,81.60486,0,0,0,655.84213,679.30051Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M610.5518,673.78022a33.98929,33.98929,0,0,0-9.533-1.02218,24.06038,24.06038,0,0,0-17.379,9.11386,24.49135,24.49135,0,0,0-4.71053,19.17721,40.53261,40.53261,0,0,0,3.77749,10.41167c2.52818,5.17506,5.56038,10.33824,10.2407,13.65454a39.73688,39.73688,0,0,0,9.0377,4.33923l24.6503,9.36656c3.62634,1.37793,7.25322,2.75606,10.91545,4.03375a211.89949,211.89949,0,0,0,57.01276,11.43233c5.919.35552,11.92757.45444,17.70188-.90474a5.749,5.749,0,0,0,3.62532-1.97555,6.30178,6.30178,0,0,0,.81-2.69858l1.51685-10.7108a9.04669,9.04669,0,0,0-.12893-4.51521c-.69486-1.80009-2.43661-2.93247-4.09733-3.89455-16.20583-9.38838-35.12808-14.56788-48.76876-27.45327-3.21124-3.03343-5.89853-7.84172-9.80015-9.90227-4.42438-2.33663-9.63493-3.67023-14.20814-5.82341C631.21684,681.70171,621.38727,676.29253,610.5518,673.78022Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M635.16155,688.21992c8.71284,2.75379,45.4985,21.83206,51.80367,28.49317-.84515.30714-29.52024-15.90188-30.38066-16.16235-7.8213-2.36765-15.68608-4.75084-23.11356-8.2158-1.49421-.697-9.70725-3.97339-9.3353-5.875C624.55541,684.31414,633.61478,687.73105,635.16155,688.21992Z"
                                        transform="translate(-206.85266 -75.40145)" opacity="0.1" />
                                    <path
                                        d="M743.85978,759.84212a2.0343,2.0343,0,0,0,1.3812-.41,2.1653,2.1653,0,0,0,.43173-1.60317l-.04059-14.59191c-4.16007-1.99922-8.81341-2.64-13.38091-3.25584L710.94,737.108c.48963.066-3.33213,9.25835-2.74614,10.48556,1.03282,2.163,8.92583,4.07993,11.15342,5.10119C727.09115,756.245,735.13807,760.148,743.85978,759.84212Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ffb8b8" />
                                    <path
                                        d="M676.9961,743.18654c-4.02375.64644-8.51478,1.21786-11.12062,4.3772-3.30456,4.00647-1.89778,9.97911-.3214,14.94233a6.45447,6.45447,0,0,0,1.37074,2.71894c1.0758,1.0705,2.72438,1.22733,4.23256,1.32366,3.6696.23438,7.5748.418,10.78107-1.39754a47.28443,47.28443,0,0,0,4.188-3.13993,26.74288,26.74288,0,0,1,7.7-3.55079,77.27909,77.27909,0,0,1,15.45641-3.21287,23.853,23.853,0,0,0,6.08891-1.08262,6.77417,6.77417,0,0,0,4.28806-4.19924c.74268-2.65177-.7853-5.35534-2.25074-7.68092-1.8255-2.897-3.75946-5.94731-6.48137-8.07994-3.97094-3.11126-5.93524-.72288-9.93521,1.26808A83.77867,83.77867,0,0,1,676.9961,743.18654Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ffb8b8" />
                                    <path
                                        d="M666.48083,746.8423l-25.54933-7.61685a33.56183,33.56183,0,0,0-9.50781-1.85838c-3.24017.00243-6.63019,1.074-8.73159,3.56168-1.98118,2.34535-2.54823,5.55078-3.04213,8.59145l-1.05653,6.50446a32.94531,32.94531,0,0,0-.59155,9.98844c.48326,3.3139,2.16045,6.6247,5.07562,8.22893,3.53553,1.94562,7.86877.99532,11.81463.18151a127.56684,127.56684,0,0,1,24.21179-2.61883c3.05812-.03689,6.26572.00175,8.968-1.44283,3.21217-1.71717,5.13389-5.348,5.46432-8.99972C674.039,755.80589,672.20292,748.54819,666.48083,746.8423Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M753.90283,740.20469c3.31209-.58551,6.23519-2.48419,9.40888-3.60492,4.46715-1.57747,9.30811-1.57745,14.04108-1.56,1.73747.0064,3.5877.04569,5.034,1.01689,2.0848,1.4,2.61912,4.20158,2.97361,6.70237l2.13879,15.08837c.40229,2.838.80219,5.75186.17472,8.548s-2.517,5.49166-5.2678,6.213c-3.34092.87606-6.61612-1.27659-9.77059-2.69068-7.88433-3.5344-17.04941-2.631-25.27025-5.27268-1.52562-.49024-3.15957-1.23985-3.782-2.72788a6.25731,6.25731,0,0,1-.29423-2.60738c.14078-4.84984-.87334-11.4724.57427-16.10748C745.16523,739.03376,750.20569,740.20469,753.90283,740.20469Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M807.97077,667.70718A43.99809,43.99809,0,0,1,823.6,666.63011c4.1783.4643,8.48322,1.637,11.53384,4.55405,3.71305,3.55044,4.90606,9.04129,5.00559,14.20093a44.614,44.614,0,0,1-9.56049,28.33464,25.588,25.588,0,0,1-5.46593,5.30736,35.84558,35.84558,0,0,1-7.11151,3.45671L762.79813,744.446c-14.52278,5.77778-29.09682,11.5723-44.24486,15.38131a3.43634,3.43634,0,0,1-4.64-1.69679,115.66858,115.66858,0,0,1-12.099-22.32378,2.0177,2.0177,0,0,1-.15588-1.6719,1.984,1.984,0,0,1,.815-.69995l39.04575-22.62864a39.47077,39.47077,0,0,0,7.94723-5.52315,19.897,19.897,0,0,0,4.08015-5.72956c.80935-1.70512.88485-5.729,1.91866-6.98929,1.0122-1.234,4.47473-1.33246,6.07391-1.81781a54.82107,54.82107,0,0,0,6.61239-2.52121c8.73424-3.94123,16.512-9.66764,24.8849-14.28241A63.54719,63.54719,0,0,1,807.97077,667.70718Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#2f2e41" />
                                    <path
                                        d="M785.83531,684.60617c-6.70819,5.08192-15.39412,9.75337-22.04265,14.9692-2.26907,1.78011-40.09506,23.2303-40.6299,26.07915,6.20271,1.05416,45.71452-26.82656,51.36768-29.60861s10.66448-6.70533,15.63028-10.59966c1.26549-.99244,6.62863-3.97587,2.99581-5.08467C791.11,679.737,787.34617,683.59021,785.83531,684.60617Z"
                                        transform="translate(-206.85266 -75.40145)" opacity="0.1" />
                                    <circle cx="511.79468" cy="415.39024" r="38" fill="#ffb8b8" />
                                    <path d="M734.64734,522.79169s-6,15,5,21-34,54-34,54l-20-58s17-6,14-22Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ffb8b8" />
                                    <path
                                        d="M709.64734,563.79169l24.218-26.73574,32.782,16.73574-5,118-8,9s-34,30-86,5c0,0-18-15-17-38s-2-26-2-26l-1-81,49.37111-9.688Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#fc0000" />
                                    <path
                                        d="M598.60023,691.0311l-6.17411,19.02315S562.69006,740.775,573.44484,749.1018s34.884-35.56837,34.884-35.56837l4.447-21.47613Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ffb8b8" />
                                    <path
                                        d="M655.64734,543.79169l-9-3s-14,4-16,18-17,85-17,85-6,3-2,8-20,50-20,50l19,9s38-40,38-44-1-8-1-12,1-4,0-7a32.16669,32.16669,0,0,1-1-8l7-16Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#fc0000" />
                                    <polygon
                                        points="553.925 381.823 522.506 365.224 479.119 372.014 470.142 412.005 492.488 411.138 498.73 396.446 498.73 410.895 509.041 410.495 515.026 387.105 518.766 412.005 555.421 411.25 553.925 381.823"
                                        fill="#2f2e41" />
                                    <path
                                        d="M538.05731,714.48169v57.68h-176.18a57.68309,57.68309,0,0,1,57.68-57.68c16.52-5.15,35.62006-6.79,56.34-6.25C495.44733,708.73169,516.43732,711.1817,538.05731,714.48169Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ff6584" />
                                    <path
                                        d="M306.037,684.17757h82.84747a5.2435,5.2435,0,0,1,5.2435,5.2435v0a5.2435,5.2435,0,0,1-5.2435,5.2435H306.037a0,0,0,0,1,0,0v-10.487A0,0,0,0,1,306.037,684.17757Z"
                                        fill="#3f3d56" />
                                    <path
                                        d="M527.23842,665.11961l22.20633-26.91828a5.82915,5.82915,0,0,1,10.865.93107l8.75714,30.91845Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                    <path
                                        d="M500.30525,678.829l8.38962-33.87224a5.82914,5.82914,0,0,1,10.2-3.85669l21.261,24.09581Z"
                                        transform="translate(-206.85266 -75.40145)" fill="#ff6584" />
                                    <path
                                        d="M155.02392,696.762h16.77923a0,0,0,0,1,0,0v35.65589a16.77922,16.77922,0,0,1-16.77922,16.77922h0a0,0,0,0,1,0,0V696.762A0,0,0,0,1,155.02392,696.762Z"
                                        fill="#ff6584" />
                                    <path
                                        d="M302.89091,686.275h82.84747a5.2435,5.2435,0,0,1,5.2435,5.2435v0a5.24351,5.24351,0,0,1-5.24351,5.24351H302.89091a0,0,0,0,1,0,0V686.275A0,0,0,0,1,302.89091,686.275Z"
                                        fill="#ff6584" />
                                    <path
                                        d="M538.05731,714.48169v57.36a56.64534,56.64534,0,0,1-62.16-63.61C495.44733,708.73169,516.43732,711.1817,538.05731,714.48169Z"
                                        transform="translate(-206.85266 -75.40145)" opacity="0.2" />
                                    <circle cx="331.20586" cy="640.13208" r="56.62991" fill="#ff6584" />
                                    <ellipse cx="385.73837" cy="644.32689" rx="6.29221" ry="14.68183"
                                        fill="#3f3d56" />
                                    <ellipse cx="370.53219" cy="629.12071" rx="1.57305" ry="3.67046"
                                        fill="#3f3d56" />
                                    <ellipse cx="382.06791" cy="621.7798" rx="1.57305" ry="3.67046"
                                        fill="#3f3d56" />
                                    <path d="M533.3074,658.27332s-3.14749-5.47519-3.14749-8.81524"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                    <path d="M534.692,654.7321s1.715-6.07809,4.10346-8.4129"
                                        transform="translate(-206.85266 -75.40145)" fill="#3f3d56" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="nav flex justify-end bg-white py-3 shadow px-10 sticky top-0">

                    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <div>

                            <button @click="open = !open" class="flex space-x-3 items-center group">
                                <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80""
                                    class="h-14 w-14 rounded-full object-cover bg-blue-400" alt="">
                                <div class="flex space-x-5 items-center ">
                                    <div class="flex flex-col text-left">
                                        <h1 class="font-bold group-hover:text-blue-700 uppercase">
                                            {{ auth()->user()->name }}</h1>
                                        <span class="leading-3 text-gray-500 text-sm">Administrator</span>
                                    </div>
                                    <div>
                                        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="h-6 w-6 fill-gray-500 transition-transform duration-200 transform group-hover:fill-blue-700 rotate-0"">
                                            <path d="M12 16L6 10H18L12 16Z"></path>
                                        </svg>
                                    </div>
                                </div>


                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1" style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-500"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">
                                Your Profile
                            </a>


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">
                                    Sign out
                                </a>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="p-10">
                    <div class="flex">
                        <div>
                            <h1 class="font-bold text-3xl text-gray-700">Welcome back, {{ auth()->user()->name }}!
                            </h1>
                            <span class="text-xl font-semibold text-gray-600">@yield('title')</span>
                        </div>
                    </div>
                    <div class="mt-10">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    @livewire('notifications')
</body>

</html>
