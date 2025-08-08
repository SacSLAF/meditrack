<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Main CSS -->
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional head content -->
    @stack('head')
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="hidden lg:flex lg:w-72 lg:flex-col">
            <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-white">
                <div class="flex h-16 flex-shrink-0 items-center px-4 bg-gradient-to-r from-purple-600 to-blue-500">
                    <h1 class="text-white font-bold text-xl">{{ config('app.name', 'Laravel') }}</h1>
                </div>
                <div class="flex flex-1 flex-col overflow-y-auto">
                    <nav class="flex-1 space-y-1 px-2 py-4">
                        <!-- Dashboard Link -->
                        <a href="{{ route('dashboard') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md bg-blue-100 text-blue-700">
                            <svg class="mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dashboard
                        </a>

                        <!-- Additional navigation items -->
                        @include('layouts.navigation-items')
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
                <div class="flex flex-1 justify-between px-4">
                    <div class="flex flex-1"></div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <span class="sr-only">Open user menu</span>
                                    <div
                                        class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <span class="ml-3 hidden md:block text-sm font-medium text-gray-700">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <svg class="ml-1 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Chart.js -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!-- Main Dashboard JS -->
    <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}"></script>

    <!-- Initialize components -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Perfect Scrollbar
            if (typeof PerfectScrollbar !== 'undefined') {
                const containers = document.querySelectorAll('.scrollbar-container');
                containers.forEach(container => {
                    new PerfectScrollbar(container);
                });
            }

            // Initialize charts if needed
            if (typeof Chart !== 'undefined') {
                // Your chart initialization code here
            }
        });
    </script>

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>