<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('doctor')->latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'doctor_id' => 'nullable|exists:users,id',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient added!');
    }

    public function edit(Patient $patient)
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.edit', compact('patient', 'doctors'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'doctor_id' => 'nullable|exists:users,id',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted!');
    }
}
