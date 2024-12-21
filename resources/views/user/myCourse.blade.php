<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">My Courses</h1>

        <!-- Filters Section -->
        <form action="{{ route('courses.index') }}" method="GET"
            class="flex flex-col md:flex-row gap-4 md:items-center mb-8">
            <!-- Search -->
            <div class="flex items-center bg-white border border-gray-300 rounded-lg shadow-sm p-2 w-full md:w-auto">
                <i class="fas fa-search text-gray-400 ml-2"></i>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="flex-1 p-2 ml-2 text-gray-700 placeholder-gray-400 outline-none border-none"
                    placeholder="Search courses..." />
            </div>

            <!-- Category Filter -->
            <div class="w-full md:w-auto">
                <select name="category"
                    class="w-full bg-white border border-gray-300 rounded-lg shadow-sm p-3 text-gray-700 focus:ring-purple-500 focus:border-purple-500 transition">
                    <option value="all">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sort -->
            <div class="w-full md:w-auto">
                <select name="sort"
                    class="w-full bg-white border border-gray-300 rounded-lg shadow-sm p-3 text-gray-700 focus:ring-purple-500 focus:border-purple-500 transition">
                    <option value="none" {{ request('sort') == 'none' ? 'selected' : '' }}>Sort (none)</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                    <option value="students_desc" {{ request('sort') == 'students_desc' ? 'selected' : '' }}>Most
                        Enrolled</option>
                </select>
            </div>

            <!-- Apply Button -->
            <button type="submit"
                class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-purple-700 transition-all">
                Apply
            </button>
        </form>

        <!-- Courses Grid -->
        @if ($enrolledCourses->isEmpty())
            <p class="text-gray-500">You haven't enrolled in any courses yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($enrolledCourses as $course)
                    <div
                        class="border rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative">
                            <img alt="Course Thumbnail" class="w-full h-48 object-cover"
                                src="{{ asset('storage/' . $course->thumbnail) }}" />
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">
                                <a href="{{ route('courselayout', $course->id) }}"
                                    class="text-black hover:text-purple-600">
                                    {{ $course->name }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-600 mt-2">
                                Category: {{ $course->categoriesconn->name ?? 'No Category' }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Instructor: {{ $course->teacherconn->user->name ?? 'No Instructor' }}
                            </p>
                            <div class="flex text-yellow-500 mt-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $enrolledCourses->links('pagination::tailwind') }}
            </div>
        @endif
    </div>
</x-app-layout>
