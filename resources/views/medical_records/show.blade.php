@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Medical Record</h2>

        <div class="space-y-3">
            <p><strong>Name:</strong> {{ $record->name }}</p>
            <p><strong>Address:</strong> {{ $record->address }}</p>
            <p><strong>Phone No:</strong> {{ $record->phone_no }}</p>
            <p><strong>Date of Birth:</strong> {{ $record->date_of_birth }}</p>
            <p><strong>Blood Group:</strong> {{ $record->blood_group }}</p>
            <p><strong>Other Information:</strong> {{ $record->other_information }}</p>

            @if($record->document)
                <p><strong>Uploaded File:</strong>
                    <a href="{{ asset('storage/' . $record->document) }}" target="_blank"
                       class="text-blue-600 underline">
                        View Document
                    </a>
                </p>
            @else
                <p class="text-gray-500 italic">No document uploaded.</p>
            @endif
        </div>
    </div>
</div>
@endsection
