<!-- main content -->
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
            <!-- cover and lessons -->
            <div class="flex gap-4 lg:flex-row flex-col items-start">
                {{-- left --}}
                <div class="flex justify-center items-center h-screen w-screen bg-gray-100">
                    <!-- Video Container -->
                    @if (isset($lessonStudent->lessons) && $lessonStudent->lessons->isNotEmpty())
                        @php
                            $lesson = $lessonStudent->lessons->first();
                        @endphp
                        <div id="youtubeIframe" class="w-full h-full">
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/{{ $lesson->path_video }}" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    @else
                        <p class="text-center text-gray-500">Lesson video is not available.</p>
                    @endif
                </div>
                {{-- right --}}
                <div class="right max-w-full w-[370px] lg:w-[300px] md:w-full shrink-0 space-y-[30px]">
                    <!-- COURSE INFORMATION -->
                    <div
                        class="border border-[#e5e5e5] rounded-[10px] px-[30px] lg:px-[20px] xxs:px-[15px] py-[35px] lg:py-[25px] xxs:py-[25px] h-auto">
                        <h5 class="font-semibold text-[24px] text-edblue text-center mb-[20px]">Lessons</h5>

                        {{-- scrolled --}}
                        <div class="overflow-auto h-[300px]">
                            @if ($lessonStudent->lessons->isNotEmpty())
                                @foreach ($lessonStudent->lessons as $index => $lesson)
                                    <div class="flex items-center gap-4 bg-purple-400 w-full rounded-xl p-3 mb-2">
                                        <div
                                            class="w-[40px] h-[40px] bg-edpurple rounded-full flex items-center justify-center">
                                            <span class="text-white font-semibold">{{ $index + 1 }}</span>
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-white font">{{ $lesson->name }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-gray-500">No lessons available for this course.</p>
                            @endif
                        </div>
                        {{-- end scrolled --}}
                    </div>
                </div>
            </div>

            <!-- txt -->
            <div class="flex gap-[30px] lg:gap-[20px] md:flex-row sm:flex-col md:items-center">
                {{-- left --}}
                <div class="left max-w-full grow">
                    <div>
                        <h4
                            class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mb-[23px]">
                            {{ $lesson->name }}</h4>

                        <!-- course meta -->
                        <div
                            class="border-b border-[#E5E5E5] pb-[25px] flex xs:flex-wrap items-center gap-[60px] lg:gap-[40px] xs:gap-[20px] mb-[34px]">
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                @if (isset($lessonStudent->teacherconn) && isset($lessonStudent->teacherconn->user))
                                    <img src="{{ asset('storage/' . $lessonStudent->teacherconn->user->avatar) }}"
                                        alt="Course Instructor"
                                        class="w-[52px] aspect-square rounded-full object-cover">
                                    <div>
                                        <h6 class="font-medium text-edblue leading-[1.2]">
                                            {{ $lessonStudent->teacherconn->user->name }}
                                        </h6>
                                    </div>
                                @else
                                    <p class="text-gray-500">Instructor information not available.</p>
                                @endif
                            </div>
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]"><i
                                            class="fa-solid fa-certificate"></i>
                                        Certificates</h6>
                                </div>
                            </div>

                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]">
                                        <i class="fa-solid fa-users"></i>
                                        {{ $lessonStudent->studentCourse_count }} Students
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <!-- tabs container -->
                        <div>
                            <div class="ed-course-details-tabs">
                                <div id="overview" class="ed-tab duration-[400ms] active">
                                    <div>
                                        <h4
                                            class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mt-[28px] mb-[15px]">
                                            Lesson Content</h4>
                                        <div class="space-y-[10px]">
                                            <p class="text-edgray">{{ $lesson->content }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- right --}}

            </div>
        </div>
    </div>
</x-app-layout>
