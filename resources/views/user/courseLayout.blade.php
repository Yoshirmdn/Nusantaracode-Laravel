<!-- main content -->
<x-guest-layout>
    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <!-- cover -->
            <div class="flex gap-4 md:flex-col flex-row items-center">
                {{-- left --}}
                <div
                    class="rounded-[8px] overflow-hidden relative z-[2] before:absolute before:inset-0 before:-z-[0] mb-[40px] md:mb-[25px] xs:mb-[15px]">
                    <img src="{{ asset('img/course-details-img.jpg') }}" alt="Course Cover"
                        class="rounded-[8px] w-full aspect-[1170/552]">

                    <a href="https://www.youtube.com/watch?v=ht7vYtWOazI&amp;pp=ygUPY291cnNlIG92ZXJ2aWV3" data-fslightbox
                        class="absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] w-[75px] xs:w-[65px] xxs:w-[60px] aspect-square bg-white rounded-full flex items-center justify-center text-[28px] text-edpurple hover:text-black before:absolute before:animate-borderFade before:-inset-[12px] before:border before:border-white before:rounded-full after:absolute after:animate-borderFade after:-inset-[5px] after:border after:border-white after:rounded-full"><i
                            class="fa-solid fa-play"></i></a>
                </div>
                {{-- right --}}
                <div
                    class="right h-full sticky top-[120px] max-w-full w-[370px] lg:w-[300px] md:w-full shrink-0 space-y-[30px]">
                    <!-- COURSE INFORMATION -->
                    <div
                        class="border border-[#e5e5e5] rounded-[10px] px-[30px] lg:px-[20px] xxs:px-[15px] py-[35px] lg:py-[25px] xxs:py-[25px]">
                        <h5 class="font-semibold text-[24px] text-edblue mb-[20px]">Lessons</h5>

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

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/clock-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Duration:</span>
                                </span>
                                <span class="text-[15px] text-edgray">6 Months</span>
                            </li>

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/lesson-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Lessons:</span>
                                </span>
                                <span class="text-[15px] text-edgray">12</span>
                            </li>

                            <li
                                class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5] last:border-b">
                                <span class="flex items-center gap-[8px] font-semibold text-edblue">
                                    <span class="icon"><img src="{{ asset('img/icon/user-group-purple.svg') }}"
                                            alt="icon"></span>
                                    <span>Students:</span>
                                </span>
                                <span class="text-[15px] text-edgray">120</span>
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
                            Ini Judul</h4>

                        <!-- course meta -->
                        <div
                            class="border-b border-[#E5E5E5] pb-[25px] flex xs:flex-wrap items-center gap-[60px] lg:gap-[40px] xs:gap-[20px] mb-[34px]">
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <img src="{{ asset('img/teacher-2.jpg') }}" alt="Course Instructor"
                                    class="w-[52px] aspect-square rounded-full object-cover">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]">Jane Cooper</h6>
                                </div>
                            </div>

                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]"><i class="fa-solid fa-crown"></i>
                                        Product and Customers</h6>
                                </div>
                            </div>
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]"><i
                                            class="fa-solid fa-certificate"></i> Certificates</h6>
                                </div>
                            </div>

                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]"><i class="fa-solid fa-users"></i>
                                        Students</h6>
                                </div>
                            </div>
                            <!-- single info -->
                            <div
                                class="flex items-center gap-[10px] border-l border-[#CDCDCD] first:border-none pl-[10px] first:pl-0">
                                <div>
                                    <h6 class="font-medium text-edblue leading-[1.2]"><i
                                            class="fa-solid fa-suitcase"></i> Job Guarantee</h6>
                                </div>
                            </div>
                        </div>

                        <!-- tabs container -->
                        <div>
                            <!-- tab navs  -->
                            <div
                                class="ed-course-details-tab-navs border border-[#E5E5E5] rounded-[10px] p-[20px] lg:p-[15px] flex gap-[16px] *:h-[56px] sm:*:h-[46px] *:rounded-[8px] *:flex-auto *:bg-edpurple/[06%] *:px-[20px] lg:*:px-[15px] *:font-semibold overflow-auto">
                                <button class="tab-nav active" data-tab="overview">About</button>
                                <button class="tab-nav" data-tab="curriculum">Resource</button>
                                <button class="tab-nav" data-tab="instructor">Reviews</button>
                                <button class="tab-nav" data-tab="reviews">Discussion</button>
                                <button class="tab-nav" data-tab="reviews">Reward</button>
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
                                            <p class="text-edgray">Consectetur adipisicing elit, sed do eiusmod tempor
                                                is
                                                incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam,
                                                made of owl the quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex
                                                ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.
                                            </p>
                                            <p class="text-edgray">The is ipsum dolor sit amet consectetur adipiscing
                                                elit.
                                                Fusce eleifend porta arcu In hac augu ehabitasse the is platea augue
                                                thelorem turpoi dictumst. In lacus libero faucibus at malesuada sagittis
                                                placerat eros sed istincidunt augue ac ante rutrum sed the is sodales
                                                augue
                                                consequat.</p>
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
</x-guest-layout>
