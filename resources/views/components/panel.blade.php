@props(['title'])

<div {{ $attributes(['class' => 'flex flex-col justify-center items-center border-2 border-white p-6 rounded-xl w-1/4 h-[90%]']) }}>
    <p class="italic text-slate-500 text-3xl mb-6">{{ $title }}</p>
    {{ $slot }}
</div>