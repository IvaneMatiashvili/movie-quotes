<x-layout>
    <x-panel title="Edit quote for">
        <div class="w-full flex flex-col justify-center italic items-center mb-10 ">
            <P>{{ $movie->title }}</P>
        </div>
        <form method="POST" action="{{ route('quotes.update', [$movie->slug, $quote->id]) }}"
              enctype="multipart/form-data" class="w-[90%] h-[80%]">
            @csrf
            @method('PATCH')
            <div class="mt-8">

                <x-form.label name="thumbnail" title="Quote thumbnail"/>

                <div class="mt-1 h-10 w-64 bg-gray-200 flex items-center">

                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $quote->thumbnail)"/>
                    <x-form.error name="thumbnail" class="mt-14"/>
                </div>
            </div>

            <div class="mt-8">

                <x-form.label name="quote" title="Quote"/>

                <div class="mt-1">
                    <x-form.textarea name="quote">
                        {{ old('quote', $quote->quote) }}
                    </x-form.textarea>
                    <x-form.error name="quote" class="mt-2"/>
                </div>
            </div>
            <x-flex.row class="justify-between">
                <x-form.button title="Update"/>
                <div class="flex align-center">
                    <a href="{{ route('quotes', $movie->slug) }}" class="hover:overline italic mt-10 text-lg text-gray-500">go back</a>
                </div>

            </x-flex.row>
        </form>
    </x-panel>
</x-layout>
