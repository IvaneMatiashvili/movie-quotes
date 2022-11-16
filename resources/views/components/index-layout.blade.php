<!doctype html>
<title>movie-quotes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')

<body style="font-family: Open Sans, sans-serif" class="w-full h-screen bg-gray-200">

    <x-flex.col class="w-full h-full">
        {{ $slot }}
    </x-flex.col>
</body>
</html>
