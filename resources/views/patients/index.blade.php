<x-app-layout>
    <x-slot name="header">Patients</x-slot>

    <div class="p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Patient List</h2>
            <a href="{{ route('patients.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700 transition">
                + Add Patient
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Phone</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Doctor</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($patients as $patient)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $patient->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $patient->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $patient->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $patient->doctor->name ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('patients.edit', $patient) }}"
                                        class="inline-flex items-center px-3 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('patients.destroy', $patient) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this patient?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $patients->links() }}
        </div>
    </div>
</x-app-layout>
