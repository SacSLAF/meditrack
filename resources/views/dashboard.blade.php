<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        @php
            $role = auth()->user()->role;
        @endphp

        @if ($role === 'admin')
            <div class="mb-4 p-4 bg-blue-100 rounded">👑 Admin Tools</div>
        @endif

        @if ($role === 'doctor')
            <div class="mb-4 p-4 bg-green-100 rounded">🩺 Doctor's Dashboard</div>
        @endif

        @if ($role === 'receptionist')
            <div class="mb-4 p-4 bg-yellow-100 rounded">📅 Reception Desk</div>
        @endif

        @if ($role === 'pharmacist')
            <div class="mb-4 p-4 bg-purple-100 rounded">💊 Pharmacy Inventory</div>
        @endif

        <div class="mt-6">Shared dashboard info here (e.g., profile, messages, etc.)</div>
    </div>
</x-app-layout>
