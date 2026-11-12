<x-admin.layout>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <div class="flex flex-col md:flex-row items-center justify-between gap-3 p-4">
                    <div class="w-full md:w-1/2">
                        <input type="text" placeholder="Search subject..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <div class="w-full md:w-auto">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                            + Add Subject
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Subject Name</th>
                                <th class="px-4 py-3">Teacher</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
                                        {{ $subject->name }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $subject->teacher?->name ?? '-' }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ count($subjects) }} of {{ count($subjects) }} subjects
                </div>

            </div>
        </div>
    </section>

</x-admin.layout>
