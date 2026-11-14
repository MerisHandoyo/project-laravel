<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <!-- Search dan Add Student -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full md:w-1/2">

                        <form id="studentSearchForm" action="{{ route('admin.student.index') }}" method="GET">

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

                        <button type="button" data-modal-target="studentModal" data-modal-toggle="studentModal"
                            class="flex items-center justify-center whitespace-nowrap text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">

                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />

                            </svg>

                            {{ $addStudent }}

                        </button>

                    </div>

                </div>

                <!-- Student Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">NIS</th>
                                <th scope="col" class="px-4 py-3">Classroom</th>
                                <th scope="col" class="px-4 py-3">Address</th>
                                <th scope="col" class="px-4 py-3 text-right">
                                    <span class="sr-only">Actions</span>
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $student)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student['name'] }}
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        {{ $student['nis'] }}
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                            {{ $student->classroom?->name ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $student->address ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 flex items-center justify-end space-x-2">

                                        <!-- Edit Button -->
                                        <button type="button" data-modal-target="editStudentModal{{ $student->id }}"
                                            data-modal-toggle="editStudentModal{{ $student->id }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit
                                        </button>

                                        <!-- Delete Button -->
                                        <button type="button"
                                            data-modal-target="deleteStudentModal{{ $student->id }}"
                                            data-modal-toggle="deleteStudentModal{{ $student->id }}"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <!-- Table Navigation -->
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">

                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing

                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ count($students) }}
                        </span>

                        of

                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ count($students) }}
                        </span>
                    </span>

                </nav>

            </div>
        </div>
    </section>

    <!-- Add Student Modal -->
    <div id="studentModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full overflow-y-auto overflow-x-hidden bg-gray-900/50">

        <div class="relative w-full max-w-4xl p-4">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

                <!-- Modal Header -->
                <div class="flex items-center justify-between p-6 border-b rounded-t dark:border-gray-600">

                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Student
                        </h3>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Fill in the student information below.
                        </p>
                    </div>

                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="studentModal">

                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>

                        <span class="sr-only">Close modal</span>
                    </button>

                </div>

                <!-- Modal Body -->
                <form action="{{ route('admin.student.store') }}" method="POST">

                    @csrf

                    <div class="grid gap-6 p-8 sm:grid-cols-2">

                        <!-- Name -->
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Name
                            </label>

                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter student name" required>
                        </div>

                        <!-- NIS -->
                        <div>
                            <label for="nis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIS
                            </label>

                            <input type="text" name="nis" id="nis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter student NIS" required>
                        </div>

                        <!-- Classroom -->
                        <div>
                            <label for="classroom_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Classroom
                            </label>

                            <select name="classroom_id" id="classroom_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>

                                <option value="" selected disabled>
                                    Select classroom
                                </option>

                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Address -->
                        <div class="sm:col-span-2">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Address
                            </label>

                            <textarea name="address" id="address" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter student address"></textarea>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div
                        class="flex items-center justify-end p-6 border-t border-gray-200 rounded-b dark:border-gray-600">

                        <button type="button" data-modal-hide="studentModal"
                            class="text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                            Cancel
                        </button>

                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">

                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 01-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>

                            Add Student

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Edit Student Modal -->
    @foreach ($students as $student)
        <div id="editStudentModal{{ $student->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full md:inset-0 bg-gray-900/50">

            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">

                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                    <!-- Modal Header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b dark:border-gray-600">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Student
                            </h3>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Update the student information below.
                            </p>
                        </div>

                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="editStudentModal{{ $student->id }}">

                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="sr-only">Close modal</span>
                        </button>

                    </div>

                    <!-- Modal Body -->
                    <form action="{{ route('admin.student.update', $student->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="grid gap-4 mb-4 sm:grid-cols-2">

                            <!-- Name -->
                            <div>
                                <label for="edit_name_{{ $student->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Name
                                </label>

                                <input type="text" name="name" id="edit_name_{{ $student->id }}"
                                    value="{{ $student->name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Enter student name" required>
                            </div>

                            <!-- NIS -->
                            <div>
                                <label for="edit_nis_{{ $student->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    NIS
                                </label>

                                <input type="text" name="nis" id="edit_nis_{{ $student->id }}"
                                    value="{{ $student->nis }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Enter student NIS" required>
                            </div>

                            <!-- Classroom -->
                            <div>
                                <label for="edit_classroom_{{ $student->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Classroom
                                </label>

                                <select name="classroom_id" id="edit_classroom_{{ $student->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>

                                    <option value="" disabled>
                                        Select classroom
                                    </option>

                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}"
                                            {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                            {{ $classroom->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Address -->
                            <div class="sm:col-span-2">
                                <label for="edit_address_{{ $student->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Address
                                </label>

                                <textarea name="address" id="edit_address_{{ $student->id }}" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Enter student address">{{ $student->address }}</textarea>
                            </div>

                        </div>

                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end space-x-4">

                            <button type="button" data-modal-hide="editStudentModal{{ $student->id }}"
                                class="text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                                Cancel
                            </button>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
                                Update Student
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    @endforeach

    <!-- Delete Student Modal -->
    @foreach ($students as $student)
        <div id="deleteStudentModal{{ $student->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-gray-900/50">

            <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                    <!-- Close Button -->
                    <button type="button"
                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteStudentModal{{ $student->id }}">

                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Close modal</span>
                    </button>

                    <!-- Delete Icon -->
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>

                    <!-- Confirmation Text -->
                    <p class="mb-4 text-gray-500 dark:text-gray-300">
                        Are you sure you want to delete
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $student->name }}
                        </span>
                        ?
                    </p>

                    <!-- Delete Form -->
                    <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <div class="flex justify-center items-center space-x-4">

                            <button data-modal-toggle="deleteStudentModal{{ $student->id }}" type="button"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>

                            <button type="submit"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const searchInput = document.getElementById('simple-search');
            const searchForm = document.getElementById('studentSearchForm');
            const suggestionList = document.getElementById('suggestionList');

            const studentNames = @json($studentNames);

            // Menampilkan rekomendasi nama
            searchInput.addEventListener('input', function() {

                const keyword = searchInput.value.trim().toLowerCase();

                suggestionList.innerHTML = '';

                if (keyword === '') {
                    suggestionList.classList.add('hidden');
                    window.location.href = searchForm.action;
                    return;
                }

                const filteredNames = studentNames.filter(function(name) {
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
