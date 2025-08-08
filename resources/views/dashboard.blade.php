@extends('layouts.dash-layout')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    @php
        $role = auth()->user()->role;
    @endphp

    <!-- Role-Specific Cards -->
    @if ($role === 'admin')
        <div class="rounded-lg bg-blue-50 p-4 shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-lg bg-blue-100 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-blue-800">Admin Tools</h3>
                    <p class="mt-1 text-sm text-blue-600">Manage system settings and users</p>
                </div>
            </div>
        </div>
    @endif

    @if ($role === 'doctor')
        <div class="rounded-lg bg-green-50 p-4 shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-lg bg-green-100 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-green-800">Doctor's Dashboard</h3>
                    <p class="mt-1 text-sm text-green-600">View patient records and appointments</p>
                </div>
            </div>
        </div>
    @endif

    @if ($role === 'receptionist')
        <div class="rounded-lg bg-yellow-50 p-4 shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-lg bg-yellow-100 text-yellow-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-yellow-800">Reception Desk</h3>
                    <p class="mt-1 text-sm text-yellow-600">Manage appointments and patient check-ins</p>
                </div>
            </div>
        </div>
    @endif

    @if ($role === 'pharmacist')
        <div class="rounded-lg bg-purple-50 p-4 shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-lg bg-purple-100 text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-purple-800">Pharmacy Inventory</h3>
                    <p class="mt-1 text-sm text-purple-600">Manage medications and prescriptions</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Shared Content -->
    <div class="rounded-lg bg-white p-6 shadow">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Shared Dashboard Information</h3>
        <div class="space-y-4 text-gray-600">
            <p>Welcome back, {{ Auth::user()->name }}! Here's your personalized dashboard.</p>
            <!-- Add more shared content here -->
        </div>
    </div>
</div>
@endsection