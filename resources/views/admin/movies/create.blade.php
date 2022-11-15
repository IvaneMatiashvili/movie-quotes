<x-layout>
    <x-panel title="Create content">
        <form method="POST" action="{{ route('movies') }}" enctype="multipart/form-data" class="w-[90%] h-[80%]">
            @csrf
            <div>

                <x-form.label name="title" title="Movie Title"/>

                <div class="mt-1">
                    <x-form.input name="title" class="h-12" type="text"/>
                    <x-form.error name="title" class="mt-2"/>
                </div>
            </div>

            <div class="mt-8">

                <x-form.label name="thumbnail" title="Quote thumbnail"/>

                <div class="mt-1 h-10 w-64 bg-gray-200 flex items-center">
                    <x-form.input name="thumbnail" type="file"/>
                    <x-form.error name="thumbnail" class="mt-14"/>
                </div>
            </div>

            <div class="mt-8">

                <x-form.label name="quote" title="Quote"/>

                <div class="mt-1">
                    <x-form.textarea name="quote"/>
                    <x-form.error name="quote" class="mt-2"/>
                </div>
            </div>

            <x-flex.row class="justify-between">
                <x-form.button title="Submit"/>
                <div class="flex align-center">
                    <a href="{{ route('movies') }}" class="hover:overline italic mt-10 text-lg text-gray-500">go back</a>
                </div>

            </x-flex.row>
        </form>
    </x-panel>
</x-layout>
