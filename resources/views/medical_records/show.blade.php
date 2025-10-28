@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gray-800 p-6">
            <h2 class="text-2xl font-bold text-white">Patient Information Form</h2>

        </div>

        <!-- Form Content -->
        <div class="p-6">
            <div class="border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Details</h3>
                <div class="grid gap-6">
                    <!-- Name Field -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Full Name</label>
                        <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                            {{ $record->name }}
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Phone Number</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                {{ $record->phone_no }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Date of Birth</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                {{ $record->date_of_birth }}
                            </div>
                        </div>
                    </div>

                    <!-- Blood Group -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Blood Group</label>
                        <div class="p-3 bg-red-50 rounded-lg border border-red-200 text-red-700 font-semibold">
                            {{ $record->blood_group }}
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Address</label>
                        <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                            {{ $record->address }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Medical Information -->
            <div class="py-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Medical Information</h3>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-600 mb-2">Additional Notes</label>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200 min-h-[100px]">
                        {{ $record->other_information }}
                    </div>
                </div>

                <!-- Documents -->
                <div class="mt-6">
                    {{-- <label class="block text-sm font-medium text-gray-600 mb-2">Medical Documents</label> --}}
                    @if($record->document)
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex-1">
                                <p class="text-sm text-blue-800">Document attached</p>
                            </div>
                            <a href="{{ asset('storage/' . $record->document) }}"
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                View Document
                            </a>
                        </div>
                    @else

                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-6 border-t border-gray-200 flex justify-end space-x-4">
                <button onclick="window.print()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Print Record
                </button>

            </div>
        </div>
    </div>
</div>
@endsection
