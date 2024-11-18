<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 mb-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Name -->
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required value="{{ old('name', $course->name) }}">
                        </div>

                        <!-- Slug -->
                        <div class="col-span-2">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ old('slug', $course->slug) }}" placeholder="Auto-generated if empty">
                        </div>

                        <!-- Path Trailer -->
                        <div class="col-span-2">
                            <label for="path_trailer" class="block mb-2 text-sm font-medium text-gray-900">Path
                                Trailer</label>
                            <input type="text" name="path_trailer" id="path_trailer"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ old('path_trailer', $course->path_trailer) }}">
                        </div>

                        <!-- About -->
                        <div class="col-span-2">
                            <label for="about" class="block mb-2 text-sm font-medium text-gray-900">About</label>
                            <textarea id="about" name="about" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Enter course description">{{ old('about', $course->about) }}</textarea>
                        </div>

                        <!-- Thumbnail -->
                        <div class="col-span-2">
                            <label for="thumbnail"
                                class="block mb-2 text-sm font-medium text-gray-900">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            @if ($course->thumbnail)
                                <p class="mt-2 text-sm text-gray-500">Current:
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                        class="w-16 h-16 rounded-md">
                                </p>
                            @endif
                        </div>

                        <!-- Category -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select name="category_id" id="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('category_id', $course->category_id) == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Teacher -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-900">Teacher</label>
                            <select name="teacher_id" id="teacher_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        @if (old('teacher_id', $course->teacher_id) == $teacher->id) selected @endif>
                                        {{ $teacher->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Update Course
                    </button>
                </form>
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
</script>
