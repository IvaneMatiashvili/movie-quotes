<x-admin-layout>
    <x-border>
            <p class="ml-8 text-xl italic text-slate-500 w-40">{{ __('content.list_of_movies') }}</p>
            @if($movies->count())
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300 bg-white">
                                    @foreach($movies as $movie)
                                        <thead class="bg-white">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-10">
                                                {{ __('content.movie_title') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="break-all block w-[20rem] py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="font-medium text-slate-500 italic">{{ $movie->title }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="relative whitespace-nowrap pl-0 pr-0 text-right text-sm font-medium">
                                                <a href="{{ route('quotes', [$movie->slug, request()->segment(count(request()->segments())) ] ) }}"
                                                   class="text-slate-500 hover:text-slate-700 italic underline"> {{ __('content.list_of_quotes') }}
                                                </a>
                                            </td>
                                            <td class="relative whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('quotes.create', [$movie->slug, request()->segment(count(request()->segments()))]  ) }}"
                                                   class="text-teal-500 hover:text-teal-700 italic">{{ __('content.add_quote') }}</a>
                                            </td>
                                            <td class="relative whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('movies.edit', [$movie->slug, request()->segment(count(request()->segments()))]) }}"
                                                   class="text-indigo-400 hover:text-indigo-600 italic">{{ __('content.edit') }}</a>
                                            </td>
                                            <td class="relative whitespace-nowrap text-center text-sm font-medium">
                                                <form method="post"
                                                      action="{{ route('movies.destroy', [$movie->slug, request()->segment(count(request()->segments()))] ) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-300 hover:text-red-400 italic">{{ __('content.delete') }}
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>

                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 w-full flex justify-end">
                    {{ $movies->links() }}
                </div>
            </div>
        @else
            <x-flex.row class="h-full">
                <p class=" text-slate-400 italic text-xl">{{ __('content.no_content') }}</p>
            </x-flex.row>
        @endif

    </x-border>

</x-admin-layout>
