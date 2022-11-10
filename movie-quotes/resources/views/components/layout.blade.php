<!doctype html>
            <title>movie-quotes</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')
            <style>
                html {
                    scroll-behavior: smooth;
                }
            </style>

        <body style="font-family: Open Sans, sans-serif" class="w-full h-screen bg-gray-200">
            <x-header/>

            <x-flex.col class="w-full h-[90%]">
                {{ $slot }}
            </x-flex.col>

        </body>
    </html>