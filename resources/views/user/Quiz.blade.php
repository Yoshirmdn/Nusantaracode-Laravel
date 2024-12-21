<x-app-layout>
    <div class="container mx-auto p-6">
        <div
            class="max-w-lg mx-auto bg-gradient-to-r from-purple-500 to-indigo-600 shadow-lg rounded-xl overflow-hidden">
            <!-- Course Thumbnail -->
            <div class="relative">
                <img src="{{ $course ? asset('storage/' . $course->thumbnail) : asset('images/default-thumbnail.jpg') }}"
                    alt="Course Thumbnail" class="h-56 w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent"></div>
            </div>

            <!-- Quiz Info -->
            <div class="px-6 py-4 bg-white rounded-b-xl">
                <h1 class="text-center text-2xl font-bold text-gray-800">Take The Quiz</h1>

                <div class="flex justify-center items-center mt-6">
                    <!-- Questions Info -->
                    <div class="text-center">
                        <h4 class="text-lg font-medium text-gray-600">Questions</h4>
                        <span class="text-gray-800 text-xl font-bold">{{ $totalQuestions }}</span>
                    </div>
                </div>

                <!-- Start Button -->
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('quiz.start', ['lessonId' => $lessonId, 'questionNumber' => 1]) }}"
                        class="relative inline-block px-6 py-3 font-semibold text-lg text-purple-600 bg-white border border-purple-600 rounded-full overflow-hidden group hover:bg-purple-600 hover:text-white transition-all duration-300">
                        <span
                            class="absolute inset-0 w-full h-full bg-purple-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        <span class="relative z-10">Start Quiz</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
