<x-home-layout>
    @if($random_movie->count())

        @if($random_movie->quotes->count())
            <div class="ml-4 ">
                <img src="{{ asset('storage/' . $random_quote->thumbnail)}}"
                     alt="thumbnail image" class="h-[24.125rem] w-[43.75rem] rounded-xl">
            </div>

            <p class="mt-14 text-white text-3xl font-sansation">"{{ $random_quote->quote }}"</p>
        @endif

        <a href="{{ route('listing', [$random_movie->slug, request()->segment(count(request()->segments()))]) }}"
           class="underline mt-14 font-sansation text-white text-3xl">"{{ $random_movie->title }}"</a>
    @else
        <x-flex.row class="h-full">
            <p class=" text-slate-400 italic text-3xl">{{ __('content.no_content') }}</p>
        </x-flex.row>
    @endif
</x-home-layout>