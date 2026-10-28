<x-admin.layout>

    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ $title }}
        </h1>
    </div>

    <p class="text-base text-gray-600 dark:text-gray-400">
        Nama: {{ $nama }}
    </p>

    <p class="text-base text-gray-600 dark:text-gray-400">
        Hobby: {{ $hobby }}
    </p>

    <p class="text-base text-gray-600 dark:text-gray-400">
        Akun Repository:
        <a href="{{ $repository }}"
            target="_blank"
            class="text-blue-600 hover:underline">
            {{ $repository }}
        </a>
    </p>

</x-admin.layout>
