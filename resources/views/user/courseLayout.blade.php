<!-- Main Content -->
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2">Lessons</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>
    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex gap-4 lg:flex-row flex-col items-start">
                {{-- Left (Video) --}}
                <div class="flex-1 bg-gray-100 rounded-[8px] overflow-hidden relative">
                    @if ($selectedLesson)
                        <div id="youtubeIframe" class="w-full max-w-[960px] h-[540px] mx-auto">
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/{{ $selectedLesson->path_video }}" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    @else
                        <p class="text-center text-gray-500">Lesson video is not available.</p>
                    @endif
                </div>

                {{-- Right (Sidebar Lessons) --}}
                <div class="right w-full lg:w-[370px] md:w-full shrink-0 space-y-[30px]">
                    <div
                        class="border border-[#e5e5e5] rounded-[10px] px-[30px] lg:px-[20px] xxs:px-[15px] py-[35px] lg:py-[25px] xxs:py-[25px] h-auto">
                        <h5 class="font-semibold text-[24px] text-edblue text-center mb-[20px]">Lessons</h5>
                        <div class="overflow-auto h-[300px]">
                            @if ($lessonStudent->lessons->isNotEmpty())
                                @foreach ($lessonStudent->lessons as $index => $lesson)
                                    <a href="{{ route('lessons.index', ['courseId' => $lessonStudent->id, 'lessonId' => $lesson->id]) }}"
                                        class="block flex items-center gap-4 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-800 w-full rounded-xl p-4 mb-3 shadow-lg hover:shadow-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 ease-in-out">
                                        <div
                                            class="w-[50px] h-[50px] bg-white text-purple-500 rounded-full flex items-center justify-center font-bold shadow-sm">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-white text-lg">{{ $lesson->name }}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-center text-gray-500">No lessons available for this course.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lesson Details --}}
            <div class="mt-8">
                @if ($selectedLesson)
                    <h4
                        class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mb-[23px]">
                        {{ $selectedLesson->name }}
                    </h4>
                    <div class="space-y-[10px]">
                        <p class="text-edgray">{{ $selectedLesson->content }}</p>
                    </div>
                @else
                    <p class="text-gray-500">Lesson details not available.</p>
                @endif
            </div>
            <div class="mt-8 flex justify-center items-center">
                <a href="{{ route('quizzes.index', ['courseId' => $lessonStudent->id]) }}"
                    class="relative px-6 py-3 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
                    <span
                        class="absolute inset-0 w-full h-full bg-purple-700 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="relative z-10 text-purple-600 group-hover:text-white font-semibold">
                        Take Quiz
                    </span>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
