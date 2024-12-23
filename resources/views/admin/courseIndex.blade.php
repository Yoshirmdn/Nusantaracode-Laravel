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
            <div class="flex justify-end mb-4">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Course
                </button>
            </div>
            @if (session('success'))
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            @if (session('error'))
                <script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: '{{ session('error ') }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                        Course</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Judul Course" required="" value="{{ old('name') }}">
                                </div>
                                <input type="hidden" name="slug" id="slug"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type or generate slug" value="{{ old('slug') }}">
                                <input type="hidden" name="teacher_id"
                                    value="{{ Auth::user()->hasRole('admin') ? null : (Auth::user()->teacher ? Auth::user()->teacher->id : '') }}">
                                {{-- thumbnail --}}
                                <div class="col-span-2">
                                    <label for="thumbnail"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail
                                        Course</label>
                                    <input type="file" name="thumbnail" id="thumbnail"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="path_trailer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Path
                                        Trailer</label>
                                    <input type="text" name="path_trailer" id="path_trailer"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="" value="{{ old('path_trailer') }}">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="category_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="about"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
                                    <div id="quill-editor" style="height: 150px; background-color: #f9fafb;"
                                        class="rounded-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-500">
                                    </div>
                                    <input type="hidden" id="about" name="about">
                                </div>
                                <div class="col-span-2">
                                    <label for="keypoints"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Keypoints
                                    </label>
                                    <div id="keypointsContainer">
                                        <!-- Tampilkan keypoints yang sudah diisi sebelumnya, jika ada -->
                                        @if (old('keypoint'))
                                            @foreach (old('keypoint') as $index => $keypoint)
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <input type="text" name="keypoint[]"
                                                        placeholder="Enter keypoint" value="{{ $keypoint }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                    <button type="button"
                                                        class="removeKeypoint text-red-600 hover:text-red-900">Hapus</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <!-- Input default jika tidak ada keypoint sebelumnya -->
                                            <div class="flex items-center space-x-2 mb-2">
                                                <input type="text" name="keypoint[]" placeholder="Enter keypoint"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                <button type="button"
                                                    class="removeKeypoint text-red-600 hover:text-red-900">Hapus</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="addKeypoint"
                                        class="inline-flex items-center px-4 py-2 mt-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                        Tambah Keypoint
                                    </button>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Course Information Section --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($courses as $course)
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Image"
                            class="w-16 h-16 rounded-md mr-4">
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ $course->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $course->categoriesconn->name ?? 'No Category' }}</p>
                            <div class="flex mt-2 space-x-4">
                                <span class="text-blue-600 font-medium">
                                    {{ $course->student_course_count ?? 0 }} Students
                                </span>
                                <span class="text-blue-600 font-medium">{{ $course->lessons_count ?? 0 }}
                                    Videos</span>
                                <span class="text-blue-600 font-medium">{{ $course->lessons_count ?? 0 }}
                                    Lessons</span>
                                <span class="text-gray-800 font-semibold">
                                    Teacher: {{ $course->teacherconn->user->name ?? 'No Teacher' }}
                                </span> <!-- Access teacher's user name -->
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href=" {{ route('courses.show', $course->id) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md">Manage</a>
                            {{-- delete --}}
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
                            </form>
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
</x-app-layout>
<script>
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('keypointsContainer');
        const addButton = document.getElementById('addKeypoint');

        // Tambah keypoint baru
        addButton.addEventListener('click', () => {
            const newKeypoint = document.createElement('div');
            newKeypoint.classList.add('flex', 'items-center', 'space-x-2', 'mb-2');
            newKeypoint.innerHTML = `
                <input type="text" name="keypoint[]" placeholder="Enter keypoint"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                <button type="button" class="removeKeypoint text-red-600 hover:text-red-900">Hapus</button>
            `;
            container.appendChild(newKeypoint);
        });

        // Hapus keypoint
        container.addEventListener('click', (e) => {
            if (e.target.classList.contains('removeKeypoint')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>
