@props(['name'])

<input name="{{ $name }}" id="{{ $name }}"
       {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
        {{ $attributes(['value' => old($name)]) }}
>
