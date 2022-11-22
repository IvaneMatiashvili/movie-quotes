<x-home-layout current-language="{{ $currentLanguage }}">
    @if($randomMovie->count())

        @if($randomMovie->quotes->count())
            <div class="ml-4 ">
                <img src="{{ asset('storage/' . $randomQuote->thumbnail)}}"
                     alt="thumbnail image" class="h-[24.125rem] w-[43.75rem] rounded-xl">
            </div>

            <p class="mt-14 text-white text-3xl font-sansation">"{{ $randomQuote->quote }}"</p>
        @endif

        <a href="{{ route('listing', [$randomMovie->slug, request()->segment(count(request()->segments()))]) }}"
           class="underline mt-14 font-sansation text-white text-3xl">"{{ $randomMovie->title }}"</a>
    @else
        <x-flex.row class="h-full">
            <p class=" text-slate-400 italic text-3xl">{{ __('content.no_content') }}</p>
        </x-flex.row>
    @endif
</x-home-layout>