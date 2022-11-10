<header class="flex justify-center border-2 border-white p-6 w-full h-[10%] bg-stone-100 bg-gray-200">
    <div class="flex justify-between w-full h-full">
        <x-header.unordered-list class="w-[10%] ml-10">
            <x-header.list class="mr-10" content="Create" address="/admin/movies/create"/>
            <x-header.list content="Edit" address="#"/>
        </x-header.unordered-list>
        <x-header.unordered-list class="w-[8%] mr-10">
            <x-header.list content="Log out" address="#"/>
        </x-header.unordered-list>
    </div>
</header>