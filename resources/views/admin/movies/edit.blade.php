<x-layout>
    <x-panel class="h-96" title="Edit">
        <form method="POST" action="{{ route('movies.update', $movie->slug ) }}" enctype="multipart/form-data" class="w-[90%] h-[80%]">
            @csrf
            @method('PATCH')
            <div>

                <x-form.label name="title" title="Movie Title"/>

                <div class="mt-1">
                    <x-form.input name="title" class="h-12" type="text" :value="$movie->title"/>
                    <x-form.error name="title" class="mt-2"/>
                </div>
            </div>
            <x-flex.row class="justify-between">
                <x-form.button title="Update"/>
                <div class="flex align-center">
                    <a href="{{ route('movies') }}" class="hover:overline italic mt-10 text-lg text-gray-500">go back</a>
                </div>

            </x-flex.row>
        </form>
    </x-panel>
</x-layout>
