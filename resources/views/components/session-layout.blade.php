<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie Quotes</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
@vite('resources/css/app.css')

</head>

<body style="font-family: Open Sans, sans-serif" class="w-full h-screen bg-gray-200">

    <x-flex.col class="w-full h-full">
        {{ $slot }}
    </x-flex.col>
</body>
</html>
