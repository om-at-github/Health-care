<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Page Content --}}
    <main class="flex-grow mb-20">
        @yield('content')
    </main>



</body>
</html>
