@props(['name'])

    <textarea rows="4" name="{{ $name }}" id="{{ $name }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
               {{ $attributes }}
    >

        {{ old($name) ?? $slot }}
    </textarea>
