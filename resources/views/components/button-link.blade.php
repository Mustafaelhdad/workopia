@props([
    "url" => "/",
    "action" => false,
    "icon" => null,
    "bgClass" => "bg-yellow-500",
    "hoverClass" => "hover:bg-yellow-600",
    "textClass" => "text-black",
])

<a class="{{ $bgClass }} {{ $textClass }} {{ $hoverClass }} rounded px-4 py-2 transition duration-300 hover:shadow-md"
    href="{{ $url }}">
    @if ($icon)
        <i class="fa fa-{{ $icon }} me-1"></i>
    @endif
    {{ $slot }}
</a>
