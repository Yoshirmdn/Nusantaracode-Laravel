<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-black">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2">Course</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Add Button to Open Modal --}}
            <div class="flex justify-end mb-4">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Course
                </button>
            </div>

            {{-- Course Information Section --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($courses as $course)
                    <div class="flex items-center mb-4">
                        <img src="{{ $course->image_path ?? 'default_image.jpg' }}" alt="Course Image"
                            class="w-16 h-16 rounded-md mr-4">
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ $course->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $course->categoriesconn->name ?? 'No Category' }}</p>
                            <div class="flex mt-2 space-x-4">
                                <span class="text-blue-600 font-medium">{{ $course->students_count ?? 0 }}
                                    Students</span>
                                <span class="text-blue-600 font-medium">{{ $course->videos_count ?? 0 }} Videos</span>
                                <span class="text-blue-600 font-medium">{{ $course->lessons_count ?? 0 }} Lessons</span>
                                <span class="text-gray-800 font-semibold">
                                    Teacher: {{ $course->teacherconn->user->name ?? 'No Teacher' }}
                                </span> <!-- Access teacher's user name -->
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            {{-- <a href="{{ route('admin.courses.manage', $course->id) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md">Manage</a> --}}
                            {{-- <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
                            </form> --}}
                        </div>
                    </div>
                @endforeach

                <!-- Pagination links -->
                <div class="mt-4">
                    {{ $courses->links() }}
                </div>
            </div>

        </div>
    </div>

    {{-- CRUD Modal --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Product</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('courses.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Course</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="path_trailer"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Path
                                Trailer</label>
                            <input type="text" name="path_trailer" id="path_trailer"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option>
                            </select>
                        </div>
                        <input type="hidden" name="teacher_id" value="{{ Auth::user()->teacher->id }}">
                        <div class="col-span-2">
                            <label for="thumbnail"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                accept="image/*">
                        </div>
                        <div class="col-span-2">
                            <label for="about"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
                            <textarea id="about" name="about" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type course description"></textarea>
                        </div>
                        <div class="col-span-2">
                            <hr class="border-gray-200 dark:border-gray-600">
                        </div>
                        {{-- @for ($i = 0; $i < 4; $i++)
                            <div class="col-span-2 sm:col-span-1">
                                <label for="keypoint_{{ $i }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Keypoint {{ $i + 1 }}
                                </label>
                                <input type="text" name="keypoints[]" id="keypoint_{{ $i }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type keypoint" required>
                            </div>
                        @endfor --}}

                    </div>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit"
                        class="bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-800 focus:outline-none">Add
                        Course</button>
                    <button data-modal-toggle="crud-modal" type="button"
                        class="bg-gray-500 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-gray-600 focus:outline-none">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
    @endpush
</x-app-layout>
