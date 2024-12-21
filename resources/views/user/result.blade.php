<x-app-layout>
    <div class="container mx-auto py-12">
        <div
            class="max-w-lg mx-auto bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white shadow-lg rounded-lg p-8 text-center">
            <h1 class="text-3xl font-bold mb-6">Quiz Result</h1>
            <p class="text-lg mb-6">
                You scored <span class="text-4xl font-extrabold text-green-400">{{ $score }}</span> out of
                <span class="text-4xl font-extrabold">{{ $totalQuestions }}</span>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-6">
                <a href="{{ route('lessons.index', ['courseId' => $lessonId]) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-full shadow-lg font-semibold transition">
                    Back to Lesson
                </a>
                <a href="{{ route('quiz.start', ['lessonId' => $lessonId, 'questionNumber' => 1]) }}"
                    class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-full shadow-lg font-semibold transition">
                    Retake Quiz
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
