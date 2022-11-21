<x-home-layout>
    @if($movie->quotes->count())
        <div class="mt-16 w-full">
            <p class="text-white font-sansation text-3xl"> {{ $movie->title }}</p>
        </div>
        <flex.col class="min-h-screen w-[40rem]">
            @foreach($movie->quotes as $quote)
                <div class="mt-20">
                    <img src="{{ asset('storage/' . $quote->thumbnail)}}"
                         alt="thumbnail image" class="h-[24.125rem] w-full">
                    <x-flex.row class="bg-white h-20 w-full border-2 border-white p-6 rounded-xl rounded-t-none ">
                        <p class="text-black font-sansation text-3xl">"{{ $quote->quote }}"</p>
                    </x-flex.row>
                </div>
            @endforeach
        </flex.col>
        <footer class="mb-40"></footer>

    @else
        <x-flex.row class="h-full">
            <p class=" text-slate-400 italic text-3xl">{{ __('content.no_content') }}</p>
        </x-flex.row>
    @endif
</x-home-layout>
