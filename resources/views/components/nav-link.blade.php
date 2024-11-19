@props(["url" => "/", "active" => false, "icon" => null, "mobile" => null])

@if ($mobile)
    <a class="block px-4 py-2 hover:bg-blue-700" href={{ url("/jobs") }}>All Jobs</a>
@else
    <a class="{{ $active ? "text-yellow-500 font-bold" : "" }} py-2 text-white hover:underline"
        href="{{ $url }}">
        @if ($icon)
            <i class="fa fa-{{ $icon }} me-1"></i>
        @endif
        {{ $slot }}
    </a>
@endif
