<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-black">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2">Quiz</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">Daftar Kuis</h2>

                    <!-- Tombol untuk menambahkan kuis -->
                    <div class="mb-4">
                        <button id="openModal"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Tambah Kuis
                        </button>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lesson</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $quiz->question }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $quiz->lesson->name ?? 'No Lesson' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('quizzes.edit', $quiz->id) }}"
                                            class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $quizzes->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambahkan kuis -->
    <div id="quizModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
            <div
                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-10">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Kuis</h3>
                    <form id="quizForm" action="{{ route('quizzes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="lesson_id" class="block text-sm font-medium text-gray-700">Lesson</label>
                            <select name="lesson_id" id="lesson_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                                <option value="">Pilih Lesson</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                            <input type="text" name="question" id="question" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="answers" class="block text-sm font-medium text-gray-700">Jawaban</label>
                            <div id="answersContainer">
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="text" name="answers[]" placeholder="Jawaban"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500" />
                                    <input type="radio" name="correct_answer" value="0" class="form-radio" />
                                </div>
                            </div>
                            <button type="button" id="addAnswer"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                Tambah Jawaban
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Simpan Kuis
                            </button>
                            <button type="button" id="closeModal"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk membuka dan menutup modal
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('quizModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('quizModal').classList.add('hidden');
        });

        // Menangani pengiriman formulir
        document.getElementById('quizForm').addEventListener('submit', function(event) {
            // Anda dapat menambahkan logika tambahan di sini jika diperlukan
        });
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

            // Tombol hapus jawaban
            div.querySelector('.removeAnswer').addEventListener('click', function() {
                div.remove();
            });
        });
    </script>
</x-app-layout>
