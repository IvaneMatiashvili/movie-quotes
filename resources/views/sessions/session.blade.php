<x-index-layout>
        <x-panel title="Log In">
            <div class="w-full flex flex-col italic justify-center items-center mb-10 ">
                <P></P>
            </div>
            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="w-[90%] h-[80%]">
                @csrf

                <div>

                    <x-form.label name="username" title="Username"/>

                    <div class="mt-1">
                        <x-form.input name="username" class="h-12" type="text"/>
                        <x-form.error name="username" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10">

                    <x-form.label name="password" title="Password"/>

                    <div class="mt-1">
                        <x-form.input name="password" type="password" class="h-12"/>
                        <x-form.error name="Password" class="mt-2"/>
                    </div>
                </div>

                <x-flex.row class="justify-between">
                    <x-form.button title="Submit"/>
                </x-flex.row>
            </form>
        </x-panel>
</x-index-layout>
