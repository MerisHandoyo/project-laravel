@props(['href' => '#', 'label' => '', 'icon' => ''])

<li class="block">
    <a href="{{ $href }}"
        class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <span class="flex items-center justify-center w-6 h-6">
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
