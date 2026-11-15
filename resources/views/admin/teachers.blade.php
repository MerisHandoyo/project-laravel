<x-admin.layout>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <!-- Search dan Add Teacher -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full md:w-1/2">

                        <form id="teacherSearchForm" action="{{ route('admin.teacher.index') }}" method="GET">

                            <div class="relative w-full">

                                <input type="text" name="search" id="simple-search" value="{{ $searchTerm }}"
                                    autocomplete="off"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 pe-12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="{{ $search }}">

                                <button type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center justify-center px-3 text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">

                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">

                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />

                                    </svg>

                                </button>

                                <!-- Autocomplete List -->
                                <div id="suggestionList"
                                    class="hidden absolute top-full left-0 z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-700 dark:border-gray-600">

                                </div>

                            </div>

                        </form>

                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                        <!-- Add Teacher Button -->
                        <button type="button" data-modal-target="teacherModal" data-modal-toggle="teacherModal"
                            class="flex items-center justify-center whitespace-nowrap text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">

                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />

                            </svg>

                            Add Teacher

                        </button>

                    </div>

                </div>

                <!-- Teacher Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">NIY</th>
                                <th class="px-4 py-3">Subject</th>
                                <th class="px-4 py-3">Start Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
                                        {{ $teacher->name }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $teacher->niy }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                            {{ $teacher->subject?->name ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $teacher->start_date }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <!-- Table Navigation -->
                <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ count($teachers) }} of {{ count($teachers) }} teachers
                </div>

            </div>
        </div>
    </section>

    <!-- Add Teacher Modal -->
    <div id="teacherModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full overflow-y-auto overflow-x-hidden bg-gray-900/50">

        <div class="relative w-full max-w-4xl p-4">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

                <!-- Modal Header -->
                <div class="flex items-center justify-between p-6 border-b rounded-t dark:border-gray-600">

                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Teacher
                        </h3>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Fill in the teacher information below.
                        </p>
                    </div>

                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="teacherModal">

                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">

                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />

                        </svg>

                        <span class="sr-only">Close modal</span>

                    </button>

                </div>

                <!-- Modal Body -->
                <form action="{{ route('admin.teacher.store') }}" method="POST">

                    @csrf

                    <div class="grid gap-6 p-8 sm:grid-cols-2">

                        <!-- Teacher Name -->
                        <div>
                            <label for="teacher_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                                Teacher Name

                            </label>

                            <input type="text" name="name" id="teacher_name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter teacher name" required>

                        </div>

                        <!-- NIY -->
                        <div>
                            <label for="teacher_niy"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                                NIY

                            </label>

                            <input type="text" name="niy" id="teacher_niy" value="{{ old('niy') }}"
                                maxlength="10" inputmode="numeric" pattern="[0-9]{10}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter 10-digit NIY" required>

                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                                Subject

                            </label>

                            <select name="subject_id" id="subject_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>

                                <option value="">Choose Subject</option>

                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ old('subject_id') == $subject->id ? 'selected' : '' }}>

                                        {{ $subject->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="start_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                                Start Date

                            </label>

                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>

                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div
                        class="flex items-center justify-end p-6 border-t border-gray-200 rounded-b dark:border-gray-600">

                        <button type="button" data-modal-hide="teacherModal"
                            class="text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">

                            Cancel

                        </button>

                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">

                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">

                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 010 2h-3v3a1 1 0 01-2 0v-3H6a1 1 0 010-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd" />

                            </svg>

                            Add Teacher

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Autocomplete Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const searchInput = document.getElementById('simple-search');
            const searchForm = document.getElementById('teacherSearchForm');
            const suggestionList = document.getElementById('suggestionList');

            const teacherNames = @json($teacherNames);

            // Menampilkan rekomendasi nama Teacher
            searchInput.addEventListener('input', function() {

                const keyword = searchInput.value.trim().toLowerCase();

                suggestionList.innerHTML = '';

                if (keyword === '') {
                    suggestionList.classList.add('hidden');
                    window.location.href = searchForm.action;
                    return;
                }

                const filteredNames = teacherNames.filter(function(name) {
                    return name.toLowerCase().startsWith(keyword);
                });

                if (filteredNames.length === 0) {
                    suggestionList.classList.add('hidden');
                    return;
                }

                filteredNames.forEach(function(name) {

                    const item = document.createElement('button');

                    item.type = 'button';
                    item.textContent = name;

                    item.className =
                        'block w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600';

                    item.addEventListener('click', function() {
                        searchInput.value = name;
                        suggestionList.classList.add('hidden');
                        searchForm.submit();
                    });

                    suggestionList.appendChild(item);

                });

                suggestionList.classList.remove('hidden');

            });

            // Menutup rekomendasi ketika klik di luar pencarian
            document.addEventListener('click', function(event) {

                if (!searchForm.contains(event.target)) {
                    suggestionList.classList.add('hidden');
                }

            });

        });
    </script>

</x-admin.layout>
