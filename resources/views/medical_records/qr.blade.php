@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center p-6">

    <h2 class="text-2xl font-semibold mb-4">Your Medical Record QR Code</h2>

    <p class="mb-4 text-gray-600">
        Scan this QR code using <strong>Google Lens</strong> or any QR code scanner to view your medical record.
    </p>

    @if($record)
        @php
            // Generate the unique public URL for the medical record
            $url = route('medical-records.public', $record->uuid);
        @endphp

        <div class="bg-white shadow-md p-6 inline-block rounded-xl">
            {!! QrCode::size(200)->generate($url) !!}
        </div>

        <p class="mt-4">
            <a href="{{ $url }}" target="_blank" class="text-blue-600 underline">
                View Record ({{ $url }})
            </a>
        </p>
    @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded relative">
            <strong>No record found!</strong><br>
            Please create or update your medical record first.
        </div>
    @endif

</div>
@endsection
