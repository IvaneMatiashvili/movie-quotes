<!doctype html>
            <title>movie-quotes</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')

        <body style="font-family: Open Sans, sans-serif" class="w-full h-screen bg-gray-200">
            @can('admin')
            <x-header/>

            <x-flex.col class="w-full h-[90%]">
                {{ $slot }}
            </x-flex.col>
            @endcan

        </body>
        @if (session()->has('success'))
            <div class="fixed bg-green-400 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm session-success">
                <P>
                    {{ session('success') }}
                </P>
            </div>

            <script type="text/javascript">
                    const sessionSuccess = document.querySelector('.session-success');
                    setTimeout(() => {
                        sessionSuccess.style.display = 'none';
                    }, 2000);
            </script>
        @endif
    </html>