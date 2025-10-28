<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2966/2966484.png" type="image/png">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Page Content --}}
    <main class="flex-grow mb-20">
        @yield('content')
    </main>

    {{-- Bottom Navigation --}}
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-md border-t border-gray-200">
        <div class="flex justify-around items-center py-2">
            <a href="{{ route('medical-records.index') }}"
               class="flex flex-col items-center text-gray-600 hover:text-blue-600 {{ request()->routeIs('medical-records.index') ? 'text-blue-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9-9 9-9-9z" />
                </svg>
                <span class="text-xs">Home</span>
            </a>

            <a href="{{ route('medical-records.qr') }}"
               class="flex flex-col items-center text-gray-600 hover:text-blue-600 {{ request()->routeIs('medical-records.qr') ? 'text-blue-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h5v5H4V4zm11 0h5v5h-5V4zM4 15h5v5H4v-5zm11 0h5v5h-5v-5z" />
                </svg>
                <span class="text-xs">QR Code</span>
            </a>

            @php
    $record = \App\Models\MedicalRecord::latest()->first();
@endphp

@if($record)
    <a href="/record/{uuid}/view"
       class="flex flex-col items-center text-gray-600 hover:text-blue-600 {{ request()->routeIs('medical-records.show') ? 'text-blue-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        <span class="text-xs">View</span>
    </a>
@else
    <a href="{{ route('medical-records.index') }}"
       class="flex flex-col items-center text-gray-600 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs">Add Record</span>
    </a>
@endif

        </div>
    </nav>

</body>
</html>
