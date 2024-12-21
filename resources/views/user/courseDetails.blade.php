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
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2">Course
                            Details</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>
    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <!-- cover -->
            <div
                class="rounded-[8px] overflow-hidden relative z-[2] before:absolute before:inset-0 before:-z-[0] before:bg-edpurple/20 mb-[40px] md:mb-[25px] xs:mb-[15px]">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Cover"
                    class="rounded-[8px] w-full aspect-[1170/552]">

                <!-- Tombol Play untuk Menampilkan Video -->
                <div id="videoContainer"
                    class="absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] w-[75px] xs:w-[65px] xxs:w-[60px] aspect-square bg-white rounded-full flex items-center justify-center text-[28px] text-edpurple hover:text-black cursor-pointer">
                    <i class="fa-solid fa-play"></i>
                </div>

                <!-- Iframe Video (Tersembunyi Secara Default) -->
                <div id="youtubeIframe" class="absolute inset-0 w-full h-full hidden">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/{{ $course->path_trailer }}" frameborder="0"
                        allow="encrypted-media" allowfullscreen></iframe>
                </div>
            </div>


            <!-- txt -->
            <div class="flex gap-[30px] lg:gap-[20px] md:flex-row sm:flex-col md:items-center">
                {{-- left --}}
                <div class="left max-w-full grow">
                    <div>
                        <h4
                            class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mb-[23px]">
                            {{ $course->name }}</h4>

                        <!-- course meta -->
                        <div
                            class="border-b border-[#E5E5E5] pb-[25px] flex xs:flex-wrap items-center gap-[60px] lg:gap-[40px] xs:gap-[20px] mb-[34px]">
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <img src="{{ $objTeacher->avatar ? asset('storage/' . $objTeacher->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($course->teacherconn->user->name) . '&background=random' }}"
                                    alt="{{ $objTeacher->name }}" class="w-16 h-16 rounded-full object-cover">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]">
                                        {{ $course->teacherconn->user->name ?? 'No Teacher' }}</h6>
                                    <span class="font-medium text-[14px] text-edgray leading-[1]">Teacher</span>
                                </div>
                            </div>

                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]">Categories</h6>
                                    <span
                                        class="font-medium text-[14px] text-edgray leading-[1]">{{ $course->categoriesconn->name }}</span>
                                </div>
                            </div>

                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]">Reviews</h6>
                                    <div class="flex gap-[7px] text-[#FFA41B] text-[14px] mt-[6px]">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- tabs container -->
                        <div>
                            <!-- tab navs  -->
                            <div
                                class="ed-course-details-tab-navs border border-[#E5E5E5] rounded-[10px] p-[20px] lg:p-[15px] flex gap-[16px] *:h-[56px] sm:*:h-[46px] *:rounded-[8px] *:flex-auto *:font-semibold overflow-auto">
                                <button
                                    class="tab-nav active bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-md transition-all duration-300 hover:shadow-lg hover:scale-105"
                                    data-tab="overview">
                                    Overview
                                </button>
                                <button
                                    class="tab-nav bg-gradient-to-r from-gray-100 to-gray-200 text-edpurple hover:from-purple-500 hover:to-indigo-500 hover:text-white shadow-md transition-all duration-300 hover:shadow-lg hover:scale-105"
                                    data-tab="curriculum">
                                    Curriculum
                                </button>
                                <button
                                    class="tab-nav bg-gradient-to-r from-gray-100 to-gray-200 text-edpurple hover:from-purple-500 hover:to-indigo-500 hover:text-white shadow-md transition-all duration-300 hover:shadow-lg hover:scale-105"
                                    data-tab="instructor">
                                    Instructor
                                </button>
                                <button
                                    class="tab-nav bg-gradient-to-r from-gray-100 to-gray-200 text-edpurple hover:from-purple-500 hover:to-indigo-500 hover:text-white shadow-md transition-all duration-300 hover:shadow-lg hover:scale-105"
                                    data-tab="reviews">
                                    Reviews
                                </button>
                            </div>
                            <!-- tabs -->
                            <div class="ed-course-details-tabs">
                                <!-- tab 01 -->
                                <div id="overview" class="ed-tab duration-[400ms] active">
                                    <div>
                                        <h4
                                            class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mt-[28px] mb-[15px]">
                                            Course Descriptions</h4>
                                        <div class="space-y-[10px]">
                                            <p class="text-edgray">
                                                {{ $course->about }}
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-semibold text-[30px] lg:text-[27px] xs:text-[25px] xxs:text-[23px] text-edblue mt-7 mb-4">
                                            What We Learn Here?
                                        </h4>
                                        <ul class="space-y-3">
                                            @foreach ($course->keypoints as $keypoint)
                                                <li class="flex items-center gap-2 text-edgray">
                                                    <svg class="w-5 h-5 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span>{{ $keypoint->keypoint }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- right --}}
                <div class="right h-full sticky top-[120px] max-w-full w-[370px] lg:w-[300px] shrink-0 space-y-[30px]">
                    <!-- COURSE INFORMATION -->
                    <div
                        class="border border-[#e5e5e5] rounded-[10px] px-[30px] lg:px-[20px] xxs:px-[15px] py-[35px] lg:py-[25px] xxs:py-[25px]">
                        <h5 class="font-semibold text-[24px] text-edblue mb-[20px]">Course includes:</h5>

                        <ul class="mb-[30px]">
                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/calender-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Level:</span>
                                </span>
                                <span class="text-[15px] text-edgray">Beginner</span>
                            </li>

                            {{-- <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/clock-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Duration:</span>
                                </span>
                                <span class="text-[15px] text-edgray">6 Months</span>
                            </li> --}}

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/lesson-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Lessons:</span>
                                </span>
                                <span class="text-[15px] text-edgray">{{ $course->lessons_count ?? 0 }}</span>
                            </li>

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon">
                                        <img src="{{ asset('img/icon/user-group-purple.svg') }}" alt="icon">
                                    </span>
                                    <span>Students:</span>
                                </span>
                                <span class="text-[15px] text-edgray">{{ $studentCount ?? 0 }}</span>
                            </li>

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/medal.svg') }}"
                                            alt="icon"></span>
                                    <span>Certifications:</span>
                                </span>
                                <span class="text-[15px] text-edgray">Yes</span>
                            </li>

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/globe.svg') }}"
                                            alt="icon"></span>
                                    <span>Language:</span>
                                </span>
                                <span class="text-[15px] text-edgray">English</span>
                            </li>
                        </ul>

                        <div class="space-y-[12px]">
                            <a href="{{ route('courselayout', ['id' => $course->id]) }}"
                                class="relative flex items-center justify-center h-[56px] rounded-[8px] w-full bg-gradient-to-r from-purple-500 via-purple-800 to-indigo-500 text-white font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 opacity-0 transition-opacity duration-300 group-hover:opacity-100 rounded-[8px]"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Join this Course
                                    <i
                                        class="fa-solid fa-arrow-right-long transform transition-transform duration-300 group-hover:translate-x-2"></i>
                                </span>
                            </a>
                        </div>

                        <!-- social links -->
                        <div class="flex gap-[28px] items-center justify-center mt-[22px]">
                            <h6 class="font-semibold text-[16px] text-black">Share:</h6>
                            <div class="flex gap-[15px] text-[16px]">
                                <a href="#" class="text-[#757277] hover:text-edpurple"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="text-[#757277] hover:text-edpurple"><i
                                        class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="text-[#757277] hover:text-edpurple"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="text-[#757277] hover:text-edpurple"><i
                                        class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('videoContainer').addEventListener('click', function() {
        document.getElementById('youtubeIframe').classList.remove('hidden');
        this.classList.add('hidden');
    });
</script>
