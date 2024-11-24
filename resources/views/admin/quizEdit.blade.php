<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kuis: {{ $quiz->question }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="lesson_id" class="block text-sm font-medium text-gray-700">Lesson</label>
                            <select name="lesson_id" id="lesson_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                                <option value="">Pilih Lesson</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}"
                                        {{ $quiz->lesson_id == $lesson->id ? 'selected' : '' }}>
                                        {{ $lesson->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                            <input type="text" name="question" id="question" value="{{ $quiz->question }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="answers" class="block text-sm font-medium text-gray-700">Jawaban</label>
                            <div id="answersContainer">
                                @foreach (old('answers', $quiz->answers->pluck('answer')->toArray()) as $index => $answer)
                                    <div class="flex items-center space-x-2 mb-2">
                                        <input type="text" name="answers[]" placeholder="Jawaban"
                                            value="{{ $answer }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500" />
                                        <input type="radio" name="correct_answer" value="{{ $index }}"
                                            class="form-radio"
                                            {{ old('correct_answer', $quiz->answers->where('is_correct', 1)->keys()->first()) == $index ? 'checked' : '' }} />
                                        <button type="button"
                                            class="removeAnswer text-red-600 hover:text-red-900">Hapus</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="addAnswer"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                Tambah Jawaban
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('addAnswer').addEventListener('click', function() {
            const answersContainer = document.getElementById('answersContainer');
            const answerCount = answersContainer.children.length;

            const div = document.createElement('div');
            div.classList.add('flex', 'items-center', 'space-x-2', 'mb-2');
            div.innerHTML = `
        <input type="text" name="answers[]" placeholder="Jawaban"
            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500" />
        <input type="radio" name="correct_answer" value="${answerCount}" class="form-radio" />
        <button type="button" class="removeAnswer text-red-600 hover:text-red-900">Hapus</button>
    `;

            answersContainer.appendChild(div);

            div.querySelector('.removeAnswer').addEventListener('click', function() {
                div.remove();
            });
        });
    </script>
</x-app-layout>
