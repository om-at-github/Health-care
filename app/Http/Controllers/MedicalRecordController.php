<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalRecordController extends Controller
{
    /**
     * Show the medical record form.
     */
    public function index()
    {
        // Fetch the single user record (latest or first)
        $record = MedicalRecord::first();
        return view('medical_records.form', compact('record'));
    }

    /**
     * Store or update the single medical record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone_no' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'blood_group' => 'nullable|string|max:10',
            'document_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'other_information' => 'nullable|string',
        ]);

        // Check if the record already exists
        $record = MedicalRecord::first();

        // Handle file upload
        if ($request->hasFile('document_path')) {
            // Delete old file if exists
            if ($record && $record->document_path) {
                Storage::disk('public')->delete($record->document_path);
            }

            $validated['document_path'] = $request->file('document_path')->store('medical_documents', 'public');
        }

        if ($record) {
            // ✅ Update the existing record
            $record->update($validated);
            $message = 'Medical record updated successfully.';
        } else {
            // ✅ Create new record if none exists
            MedicalRecord::create($validated);
            $message = 'Medical record created successfully.';
        }

        return redirect()->route('medical-records.index')->with('success', $message);
    }

    /**
     * Display the record via QR (public view).
     */
    public function show($uuid)
    {
        $record = MedicalRecord::where('uuid', $uuid)->firstOrFail();
        return view('medical_records.show', compact('record'));
    }

    /**
     * Display the QR code for the single user record.
     */
  public function qr()
{
    $record = MedicalRecord::first();

    if (!$record) {
        return redirect()->route('medical-records.index')
                         ->with('success', 'Please add your medical record first.');
    }

    // ✅ Use correct route name
    $url = route('medical-records.public', $record->uuid);

    return view('medical_records.qr', compact('record', 'url'));
}



    public function showPublic($uuid)
{
    $record = MedicalRecord::where('uuid', $uuid)->firstOrFail();

    return view('medical_records.show', compact('record'));
}
}
