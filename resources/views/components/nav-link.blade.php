@props(['href', 'active' => false])

@php
    $classes = $active ? 'nav-link active' : 'nav-link';
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
