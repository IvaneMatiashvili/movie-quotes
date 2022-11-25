@props(['current-language'])
<!doctype html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie Quotes</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
@vite('resources/css/app.css')

<body style="font-family: Open Sans, sans-serif" class="w-full min-h-screen bg-radial-gradient-black">

    <x-flex.col class="w-full min-h-screen">
        @if($currentLanguage === 'Georgian')
                <x-flex.row class="w-10 fixed left-10 top-[44%] h-10 border border-white rounded-full cursor-pointer">
                    <a href="{{ route('lang.switch', 'en') }}" class="w-full h-10 flex text-white justify-center items-center">
                        en
                    </a>
                </x-flex.row>
                <x-flex.row class="w-10 h-10 fixed font-sansation top-[50%] left-10 border border-white rounded-full text-black bg-white cursor-pointer">
                    <a href="{{ route('lang.switch', 'ka') }}" class="w-full font-sansation h-10 flex justify-center items-center">
                        ka
                    </a>
                </x-flex.row>
        @else
            <x-flex.row class="w-10 fixed left-10 top-[44%] h-10 border border-white rounded-full bg-white cursor-pointer">
                <a href="{{ route('lang.switch', 'en') }}" class="w-full h-10 flex font-sansation text-black text-white justify-center items-center">
                    en
                </a>
            </x-flex.row>
            <x-flex.row class="w-10 h-10 fixed top-[50%] left-10 border border-white rounded-full text-white cursor-pointer">
                <a href="{{ route('lang.switch', 'ka') }}" class="w-full h-10 font-sansation flex justify-center items-center">
                    ka
                </a>
            </x-flex.row>
        @endif
            <x-flex.col class="w-[40rem]">
                {{ $slot }}
            </x-flex.col>
    </x-flex.col>
</body>
</html>
