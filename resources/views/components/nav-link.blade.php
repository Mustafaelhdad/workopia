@props(["url" => "/", "active" => false, "icon" => null])

<a class="{{ $active ? "text-yellow-500 font-bold" : "" }} py-2 text-white hover:underline" href="{{ $url }}">
    @if ($icon)
        <i class="fa fa-{{ $icon }} me-1"></i>
    @endif
    {{ $slot }}
</a>
