@props(['href' => '#', 'label' => '', 'icon' => ''])

@php
    $path = trim(parse_url($href, PHP_URL_PATH) ?? $href, '/');
    $active = $path !== '' && request()->is($path, $path . '/*');
@endphp

<li class="block">
    <a href="{{ $href }}" @if ($active) aria-current="page" @endif
        class="sidebar-link {{ $active ? 'sidebar-link-active' : '' }} flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white">
        <span class="sidebar-icon flex items-center justify-center w-6 h-6">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                {!! $icon !!}
            </svg>
        </span>
        <span class="ml-3">
            {{ $label }}
        </span>
    </a>
</li>
