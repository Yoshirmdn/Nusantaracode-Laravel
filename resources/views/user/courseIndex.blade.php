<x-app-layout>
    <div class="container mx-auto p-6 relative z-10">
        {{-- <!-- Background SVG -->
        <div class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-cover bg-center z-0"
            style="background-image: url('https://your-svg-background-url.svg');">
        </div> --}}
        <div class="flex flex-col md:flex-row items-center md:justify-end gap-4 mt-5">
            <div class="flex items-center w-full md:w-auto bg-white border border-gray-300 rounded-lg shadow-sm p-2">
                <i class="fas fa-search text-gray-400 ml-2"></i>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="flex-1 p-2 ml-2 text-gray-700 placeholder-gray-400 outline-none border-none"
                    placeholder="Search courses" />
            </div>

            <div class="w-full md:w-auto">
                <select name="category"
                    class="w-full bg-white border border-gray-300 rounded-lg shadow-sm p-3 text-gray-700 focus:ring-purple-500 focus:border-purple-500 transition">
                    <option value="all">All categories...</option>
                    @foreach ($Allcategories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

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

            <button type="submit"
                class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-purple-700 transition-all">
                Apply
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 relative z-10 mt-5">
            @foreach ($Allcourses as $All)
                <div class="border rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img alt="Group of people working on a laptop" class="w-full h-48 object-cover" height="400"
                            src="{{ asset('storage/' . $All->thumbnail) }}" width="600" />
                    </div>
                    <div class="p-4">
                        <span class="bg-gray-200 text-gray-800 text-xs font-semibold py-1 rounded-sm px-2">
                            Beginner || {{ $All->categoriesconn->name ?? 'No Category' }}
                        </span>
                        <span class="text-purple-600 text-xl font-bold float-right">
                            Free
                        </span>
                        <h3 class="text-lg font-semibold mt-2">
                            <a href="{{ route('coursedetails.show', $All->id) }}"
                                class="text-black hover:text-purple-600">
                                {{ $All->name }}
                            </a>
                        </h3>

                        <div class="flex items-center text-gray-600 text-sm mt-2">
                            <i class="fas fa-user-friends mr-1">
                            </i>
                            {{ $All->student_course_count ?? 0 }} Enrolled
                            <i class="fas fa-book ml-4 mr-1">
                            </i>
                            {{ $All->lessons_count ?? 0 }}
                        </div>
                        <div class="flex items-center mt-4">
                            <img alt="Instructor's profile picture" class="w-10 h-10 rounded-full mr-2" height="100"
                                src="{{ $All->teacherconn->user->avatar ? asset('storage/' . $All->teacherconn->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($All->teacherconn->user->name) . '&background=random' }}"
                                width="100" />
                            <div>
                                <p class="text-sm font-semibold">
                                    {{ $All->teacherconn->user->name ?? 'No Teacher' }}
                                </p>
                                <div class="flex text-yellow-500">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star-half-alt">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $Allcourses->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
