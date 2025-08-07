<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Add New Patient</h2>
    </x-slot>

    <div class="p-6 max-w-2xl mt-2 mx-auto bg-white shadow rounded-lg">
        <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                <input id="name" name="name" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="email"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input id="phone" name="phone"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label for="doctor_id" class="block text-sm font-medium text-gray-700 mb-1">Assign Doctor</label>
                <select id="doctor_id" name="doctor_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                    <option value="">-- Select Doctor --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2 bg-green-600 text-white font-medium text-sm rounded-md hover:bg-green-700 transition">
                    💾 Save Patient
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
