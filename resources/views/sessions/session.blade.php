<x-session-layout>
        <x-panel title="{{ __('content.login') }}">
            <div class="w-full flex flex-col italic justify-center items-center mb-10 ">
                <P></P>
            </div>
            <form method="POST" action="{{ route('login', request()->segment(count(request()->segments()))) }}" enctype="multipart/form-data" class="w-[90%] h-[80%]">
                @csrf

                <div>

                    <x-form.label name="username" title="{{ __('content.username') }}"/>

                    <div class="mt-1">
                        <x-form.input name="username" class="h-12" type="text"/>
                        <x-form.error name="username" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10">

                    <x-form.label name="password" title="{{ __('content.password') }}"/>

                    <div class="mt-1">
                        <x-form.input name="password" type="password" class="h-12"/>
                        <x-form.error name="password" class="mt-2"/>
                    </div>
                </div>

                <x-flex.row class="justify-between">
                    <x-form.button title="{{ __('content.submit_btn') }}"/>
                </x-flex.row>
            </form>
        </x-panel>
</x-session-layout>
