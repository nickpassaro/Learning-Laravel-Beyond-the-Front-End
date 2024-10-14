<!-- Take in routeName as prop from nav.blade.php -->
@props(['routeName'])

@php
    // Get the current route name
    $currentRoute = request()->route()->getName();

    // For each link generated by this component, check if the current route is the same as the routeName. Will simply return true or false.
    $isActive = $currentRoute == $routeName;
@endphp

<a href="
        {{ route($routeName) }}"
    class="
        block md:inline rounded-md px-3 py-2 text-base md:text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white
        {{ $isActive ? 'bg-gray-900 text-white' : '' }}"
    aria-current="
        {{ $isActive ? 'page' : 'false' }}">
    {{ $slot }}
</a>
