@props(['content', 'address'])
<li {{ $attributes->merge() }}>
    <a href="{{ $address }}" class="hover:overline">
       {{ $content }}
    </a>
</li>
