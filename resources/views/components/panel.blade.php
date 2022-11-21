@props(['title'])

<div {{ $attributes(['class' => 'flex flex-col justify-center items-center border-2 border-white p-6 rounded-xl w-[35rem] min-h-[60rem]']) }}>
    <p class="italic text-slate-500 text-3xl mb-6">{{ $title }}</p>
    {{ $slot }}
</div>