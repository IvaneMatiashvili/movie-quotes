<x-admin-layout>
    <x-panel class="min-h-[31rem]" title="{{ __('content.edit') }}">
        <form method="POST" action="{{ route('movies.update', [$movie->slug, request()->segment(count(request()->segments()))] ) }}" enctype="multipart/form-data" class="w-[90%] h-[80%]">
            @csrf
            @method('PATCH')
            <div>

                <x-form.label name="title" title="{{ __('content.movie_title_en') }}"/>

                <div class="mt-1">
                    <x-form.input name="title" class="h-12" type="text" :value="$movie->getTranslation('title', 'en')"/>
                    <x-form.error name="title" class="mt-2"/>
                </div>
            </div>
            <div class="mt-8">

                <x-form.label name="title-ka" title="{{ __('content.movie_title_ka') }}"/>

                <div class="mt-1">
                    <x-form.input name="title-ka" class="h-12" type="text" :value="$movie->title"/>
                    <x-form.error name="title-ka" class="mt-2"/>
                </div>
            </div>
            <x-flex.row class="justify-between">
                <x-form.button title="{{ __('content.update_btn') }}"/>
                <div class="flex align-center">
                    <a href="{{ route('movies', request()->segment(count(request()->segments()))) }}" class="hover:overline italic mt-10 text-lg text-gray-500">{{ __('content.go_back') }}</a>
                </div>

            </x-flex.row>
        </form>
    </x-panel>
</x-admin-layout>
