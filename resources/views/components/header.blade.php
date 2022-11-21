<header class="flex justify-center border-2 border-white p-6 w-full h-[10%] bg-stone-100 bg-gray-200  mb-16">
    <div class="flex justify-between w-full h-full">
        <x-header.unordered-list class="w-[18%] ml-10">
            <x-header.list class="mr-10" content="{{ __('content.create') }}" address="{{ route('movies.create', request()->segment(count(request()->segments()))) }}"/>
            <x-header.list content="{{ __('content.list_of_movies') }}" address="{{ route('movies', request()->segment(count(request()->segments()))) }}"/>
        </x-header.unordered-list>
        <x-header.unordered-list class="w-[15rem] mr-10 justify-between">
            <form method="post" action="{{ route('logout', request()->segment(count(request()->segments()))) }}">
                @csrf

                <button type="submit" class="hover:overline">{{ __('content.logout') }}</button>
            </form>
            <x-header.unordered-list class="w-[5rem] justify-center border-0 border-l-2 rounded-sm">
                <li class="mr-2 hover:overline">
                    <a href="{{ 'en' }}" >en</a>
                </li>
                <li class="hover:overline">

                    <a href="{{ 'ka' }}">ka</a>
                </li>
            </x-header.unordered-list>
        </x-header.unordered-list>
    </div>
</header>