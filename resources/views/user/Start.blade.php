<x-app-layout>
    <div class="container mx-auto py-12">
        <div
            class="max-w-2xl mx-auto bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white shadow-lg rounded-lg">
            <div class="p-8">
                <h1 class="text-2xl font-bold mb-4">Question {{ $questionNumber }}</h1>
                <p class="text-lg mb-6">{{ $quiz->question }}</p>

                <form action="{{ route('quiz.process') }}" method="post" class="space-y-6">
                    @csrf
                    <input type="hidden" name="lessonId" value="{{ $lessonId }}">
                    <input type="hidden" name="questionNumber" value="{{ $questionNumber }}">

                    <div class="space-y-4">
                        @foreach ($quiz->answers as $answer)
                            <label
                                class="block bg-white text-gray-800 p-4 rounded-lg shadow-md cursor-pointer hover:bg-gray-100 transition">
                                <input type="radio" name="answer" value="{{ $answer->id }}" required
                                    class="mr-3 accent-purple-500">
                                <span class="font-medium">{{ $answer->answer }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-900 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition-all">
                            Submit Answer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
