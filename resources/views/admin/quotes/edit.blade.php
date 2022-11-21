<x-admin-layout>
    <x-panel title="{{ __('content.create_quote_for') }}">
        <div class="break-all w-[20rem] flex flex-col justify-center italic items-center mb-10 ">
            <P>{{ $movie->title }}</P>
        </div>
        <form method="POST" action="{{ route('quotes.update', [$movie->slug, $quote->id, request()->segment(count(request()->segments()))]) }}"
              enctype="multipart/form-data" class="w-[90%] h-[80%]">
            @csrf
            @method('PATCH')
            <div class="mt-8">

                <x-form.label name="thumbnail" title="{{ __('content.edit_image') }}"/>

                <div class="mt-1 h-10 w-64 bg-gray-200 flex items-center">

                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $quote->thumbnail)"/>
                    <x-form.error name="thumbnail" class="mt-14"/>
                </div>
            </div>

            <div class="mt-8">

                <x-form.label name="quote" title="{{ __('content.quote_en') }}"/>

                <div class="mt-1">
                    <x-form.textarea name="quote">
                        {{ old('quote', $quote->getTranslation('quote', 'en')) }}
                    </x-form.textarea>
                    <x-form.error name="quote" class="mt-2"/>
                </div>
            </div>
            <div class="mt-8">

                <x-form.label name="quote-ka" title="{{ __('content.quote_ka') }}"/>

                <div class="mt-1">
                    <x-form.textarea name="quote-ka">
                        {{ old('quote', $quote->quote) }}
                    </x-form.textarea>
                    <x-form.error name="quote-ka" class="mt-2"/>
                </div>
            </div>
            <x-flex.row class="justify-between">
                <x-form.button title="{{ __('content.update_btn') }}"/>
                <div class="flex align-center">
                    <a href="{{ route('quotes', [$movie->slug, request()->segment(count(request()->segments()))]) }}" class="hover:overline italic mt-10 text-lg text-gray-500">{{ __('content.go_back') }}</a>
                </div>

            </x-flex.row>
        </form>
    </x-panel>
</x-admin-layout>
