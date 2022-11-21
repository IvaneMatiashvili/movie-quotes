<x-admin-layout>
    <x-border>
            <x-flex.row class="justify-between">
                <div>
                    <p class="ml-8 text-xl italic text-slate-500 w-[20rem]">{{ __('content.list_of_quotes_for') }}</p>
                    <p class="ml-8 break-all w-[30rem] text-lg italic text-zinc-400 w-40">{{ $movie->title }}</p>
                </div>

                <div>
                    <a href="{{ route('movies', request()->segment(count(request()->segments()))) }}" class="hover:overline italic mr-10 text-lg text-gray-500">{{ __('content.go_back') }}</a>
                </div>
            </x-flex.row>
            @if($quotes->count())
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300 bg-white">
                                    @foreach($quotes as $quote)
                                        <tbody class="divide-y divide-gray-200 bg-white w-full">
                                        <tr>
                                            <td class="break-all block w-[30rem] py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="ml-4 ">
                                                        <div class="font-medium text-slate-500 italic">{{ $quote->quote }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="relative whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('quotes.edit',[ $movie->slug, $quote->id, request()->segment(count(request()->segments()))] ) }}"
                                                   class="text-indigo-400 hover:text-indigo-600 italic">{{ __('content.edit') }}</a>
                                            </td>
                                            <td class="relative whitespace-nowrap text-center text-sm font-medium">
                                                <form method="post"
                                                      action="{{ route('quotes.destroy',[ $movie->slug, $quote->id, request()->segment(count(request()->segments()))] ) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-300  mr-4 hover:text-red-400 italic">{{ __('content.delete') }}
                                                    </button>

                                                </form>
                                            </td>
                                        <tr>
                                            <td class="break-all block w-[30rem] py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="ml-4 ">
                                                        <img src="{{ asset('storage/' . $quote->thumbnail)}}"
                                                             alt="thumbnail image" class="h-20 rounded-xl" width="100">
                                                    </div>
                                                </div>
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
                    {{ $quotes->links() }}
                </div>
            </div>
        @else
            <x-flex.row class="h-full">
                <p class=" text-slate-400 italic text-xl">{{ __('content.no_content') }}</p>
            </x-flex.row>
        @endif

    </x-border>

</x-admin-layout>
