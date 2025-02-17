@php
    // Take in route name from nav component and compare it to the URL. If they match, isActive is true. If isActive is true, the link is styled differently and aria-current is set to page.
@endphp

@props(['routeName' => null])

@php
    $currentRoute = request()->route()->getName();
    $isActive = $currentRoute == $routeName;
@endphp

<a @if ($routeName) href="{{ route($routeName) }}" @endif
   class="{{ $isActive ? 'bg-gray-900 text-white' : '' }} sm:mx-2 rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
   aria-current="{{ $isActive ? 'page' : 'false' }}">
    {{ $slot }}
</a>
