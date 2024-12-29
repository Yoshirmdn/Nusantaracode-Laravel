<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-black">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
            </ol>
        </nav>
    </x-slot>


    <div class="pt-1">
        <div class="bg-white">
            {{-- Hero --}}
            <section class="bg-white pt-[120px] pb-[190px] relative z-[1] overflow-hidden">
                <div class="container max-w-[71.6%] xxxl:max-w-[86.5%] xxl:max-w-[90.6%] mx-auto">
                    <div class="flex flex-row md:flex-col gap-x-28 gap-y-10 items-center">
                        <!-- banner text -->
                        <div class="max-w-[49%] xxxl:max-w-[45.5%] md:max-w-full shrink-0">
                            <h6 class="text-black uppercase font-medium mb-2">ONLINE <span
                                    class="text-purple-600">Learning</span> COURSE</h6>
                            <h1
                                class="font-medium text-[clamp(35px,5.4vw,80px)] text-blue-700 tracking-tight leading-[1.12] mb-6">
                                Explore Your Skills With <span class="font-bold">
                                    <span
                                        class="inline-block text-purple-600 relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[240px] before:h-[21px] before:bg-[url('{{ asset('img/banner-2-title-vector.svg') }}')]">
                                        Online
                                    </span>
                                    Class
                                </span>
                            </h1>
                            <p class="text-gray-600 font-medium mb-10">
                                Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <a href=""
                                    class="relative px-6 py-2.5 border border-purple-600 text-purple-600 font-medium rounded-md overflow-hidden group transition duration-300 ease-in-out">
                                    <span
                                        class="absolute inset-0 w-full h-full bg-purple-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                                    <span class="relative z-10 group-hover:text-white">Start a course</span>
                                </a>
                                <a href=""
                                    class="relative px-6 py-2.5 border border-black text-black font-medium rounded-md overflow-hidden group transition duration-300 ease-in-out">
                                    <span
                                        class="absolute inset-0 w-full h-full bg-black transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                                    <span class="relative z-10 group-hover:text-white">About us</span>
                                </a>
                            </div>

                        </div>

                        <!-- banner image -->
                        <div class="max-w-[51%] md:max-w-full">
                            <div class="w-max relative z-[1] flex gap-7 items-center">
                                <img src="{{ asset('img/banner-2-img-1.jpg') }}" alt="banner image"
                                    class="border-4 border-white rounded-2xl max-w-[241px] aspect-[261/366]">
                                <img src="{{ asset('img/banner-2-img-2.jpg') }}" alt="banner image"
                                    class="rounded-2xl h-96">

                                <!-- vectors -->
                                <div>
                                    <div
                                        class="w-[242px] aspect-square rounded-full bg-purple-600 opacity-80 blur-[110px] absolute -z-[1] bottom-0 left-[163px]">
                                    </div>
                                    <img src="{{ asset('img/banner-2-img-vector-1.svg') }}" alt="vector"
                                        class="pointer-events-none absolute -z-[1] top-[30px] -left-[35px]">
                                    <img src="{{ asset('img/banner-2-img-vector-2.svg') }}" alt="vector"
                                        class="pointer-events-none absolute -z-[1] -top-[50px] -right-[40px]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- vector -->
                <div>
                    <img src="{{ asset('img/banner-2-vector-1.svg') }}" alt="vector"
                        class="pointer-events-none absolute -z-[1] top-[135px] left-[38px] xxxl:hidden">
                    <img src="{{ asset('img/banner-2-vector-2.svg') }}" alt="vector"
                        class="pointer-events-none absolute -z-[1] bottom-0 left-0">
                    <img src="{{ asset('img/banner-2-vector-3.svg') }}" alt="vector"
                        class="pointer-events-none absolute -z-[1] -bottom-[8px] right-0">
                </div>
            </section>
            {{-- Hero End --}}
            {{-- Show Card For Teacher & Admin --}}
            @hasanyrole('admin|teacher')
                <section class="h-full bg-white">
                    <div class="relative z-10 mt-24 md:-mt-24">
                        <div class="mx-10 bg-white sm:p-8 rounded-2xl shadow-lg">
                            <div class="grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 xxs:grid-cols-1 gap-5">
                                <!-- Development Category -->
                                <a
                                    class="border border-gray-200 rounded-lg py-4 px-5 flex flex-row items-center gap-y-4 gap-x-5 hover:bg-[#F8B81F] hover:border-yellow-400 group">
                                    <!-- Icon -->
                                    <div
                                        class="bg-[#F8B81F] shrink-0 w-[84px] sm:w-[64px] aspect-square rounded-full p-[14px] duration-[400ms] flex items-center justify-center group-hover:bg-white">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M32 7.5V2.8125C32 1.26169 30.7383 0 29.1875 0H2.8125C1.26169 0 0 1.26169 0 2.8125V7.5H32ZM21.625 3.75H27.25C27.7677 3.75 28.1875 4.16975 28.1875 4.6875C28.1875 5.20525 27.7677 5.625 27.25 5.625H21.625C21.1073 5.625 20.6875 5.20525 20.6875 4.6875C20.6875 4.16975 21.1073 3.75 21.625 3.75ZM12.25 3.75C12.7677 3.75 13.1875 4.16975 13.1875 4.6875C13.1875 5.20525 12.7677 5.625 12.25 5.625C11.7323 5.625 11.3125 5.20525 11.3125 4.6875C11.3125 4.16975 11.7323 3.75 12.25 3.75ZM8.5 3.75C9.01775 3.75 9.4375 4.16975 9.4375 4.6875C9.4375 5.20525 9.01775 5.625 8.5 5.625C7.98225 5.625 7.5625 5.20525 7.5625 4.6875C7.5625 4.16975 7.98225 3.75 8.5 3.75ZM4.75 3.75C5.26775 3.75 5.6875 4.16975 5.6875 4.6875C5.6875 5.20525 5.26775 5.625 4.75 5.625C4.23225 5.625 3.8125 5.20525 3.8125 4.6875C3.8125 4.16975 4.23225 3.75 4.75 3.75ZM0 9.375V29.0625C0 30.6133 1.26169 31.875 2.8125 31.875H29.1875C30.7383 31.875 32 30.6133 32 29.0625V9.375H0ZM10.9606 22.7054C11.365 23.0289 11.4305 23.6188 11.1071 24.0231C10.7837 24.4274 10.1936 24.493 9.78938 24.1695L5.10187 20.4195C4.63319 20.0447 4.63287 19.3305 5.10187 18.9554L9.78938 15.2054C10.1935 14.8819 10.7836 14.9474 11.1071 15.3518C11.4305 15.7561 11.365 16.3461 10.9606 16.6694L7.18825 19.6875L10.9606 22.7054ZM19.6742 13.4943L14.0492 26.6193C13.8453 27.0951 13.2943 27.3158 12.8182 27.1117C12.3423 26.9077 12.1218 26.3566 12.3258 25.8807L17.9508 12.7557C18.1548 12.2798 18.7059 12.0594 19.1818 12.2633C19.6577 12.4672 19.8782 13.0184 19.6742 13.4943ZM26.8981 20.4196L22.2106 24.1696C21.807 24.4926 21.2169 24.4281 20.8929 24.0232C20.5695 23.6189 20.635 23.0289 21.0394 22.7055L24.8118 19.6875L21.0394 16.6696C20.635 16.3461 20.5695 15.7562 20.8929 15.3519C21.2163 14.9476 21.8063 14.882 22.2106 15.2055L26.8981 18.9555C27.3668 19.3303 27.3671 20.0444 26.8981 20.4196Z"
                                                class="fill-white group-hover:fill-[#F8B81F]" />
                                        </svg>
                                    </div>
                                    <!-- Text -->
                                    <div>
                                        <h5 class="font-semibold text-xl text-blue-600 duration-300 group-hover:text-white">
                                            Total Student</h5>
                                        <h6 class="text-gray-500 duration-300 group-hover:text-white">{{ $studentCount }}
                                        </h6>
                                    </div>
                                </a>

                                <!-- Data Science Category -->
                                <a
                                    class="border border-gray-200 rounded-lg py-4 px-5 flex flex-row items-center gap-y-4 gap-x-5 hover:bg-sky-400 hover:border-sky-400 group">
                                    <div
                                        class="bg-sky-400 shrink-0 w-20 sm:w-16 aspect-square rounded-full p-3.5 duration-300 flex items-center justify-center group-hover:bg-white">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27.25 9.25H25.5378C25.4188 8.91592 25.2829 8.58811 25.1305 8.26787L26.341 7.05625C26.5519 6.84528 26.6704 6.55918 26.6704 6.26087C26.6704 5.96257 26.5519 5.67647 26.341 5.4655L23.1595 2.284C22.9485 2.0731 22.6624 1.95462 22.3641 1.95462C22.0658 1.95462 21.7797 2.0731 21.5688 2.284L20.3571 3.4945C20.037 3.34182 19.7092 3.20588 19.375 3.08725V1.375C19.375 1.07663 19.2565 0.790483 19.0455 0.579505C18.8345 0.368526 18.5484 0.25 18.25 0.25H13.75C13.4516 0.25 13.1655 0.368526 12.9545 0.579505C12.7435 0.790483 12.625 1.07663 12.625 1.375V3.08725C12.2908 3.20588 11.963 3.34182 11.6429 3.4945L10.4313 2.284C10.2203 2.0731 9.93419 1.95462 9.63588 1.95462C9.33757 1.95462 9.05147 2.0731 8.8405 2.284L5.659 5.4655C5.4481 5.67647 5.32962 5.96257 5.32962 6.26087C5.32962 6.55918 5.4481 6.84528 5.659 7.05625L6.8695 8.26787C6.71682 8.58797 6.58088 8.91579 6.46225 9.25H4.75C4.45163 9.25 4.16548 9.36853 3.95451 9.5795C3.74353 9.79048 3.625 10.0766 3.625 10.375V13.75H10.4875C10.3207 12.9327 10.3377 12.0886 10.5374 11.2788C10.737 10.4689 11.1143 9.71359 11.6418 9.06751C12.1693 8.42142 12.834 7.90074 13.5875 7.54318C14.3411 7.18561 15.1648 7.00011 15.9989 7.00011C16.833 7.00011 17.6566 7.18561 18.4102 7.54318C19.1638 7.90074 19.8284 8.42142 20.3559 9.06751C20.8835 9.71359 21.2607 10.4689 21.4604 11.2788C21.66 12.0886 21.6771 12.9327 21.5103 13.75H28.375V10.375C28.375 10.0766 28.2565 9.79048 28.0455 9.5795C27.8345 9.36853 27.5484 9.25 27.25 9.25Z"
                                                class="group-hover:fill-[#39c0fa] fill-white" />
                                            <path
                                                d="M20.5 12.625C20.5 11.4315 20.0259 10.2869 19.182 9.44302C18.3381 8.59911 17.1935 8.125 16 8.125C14.8065 8.125 13.6619 8.59911 12.818 9.44302C11.9741 10.2869 11.5 11.4315 11.5 12.625C11.5 13.0154 11.5652 13.3889 11.6586 13.75H20.3414C20.4347 13.3889 20.5 13.0154 20.5 12.625ZM12.625 23.875V28.375C12.625 28.6734 12.5065 28.9595 12.2955 29.1705C12.0845 29.3815 11.7984 29.5 11.5 29.5H4.75C4.45163 29.5 4.16548 29.3815 3.9545 29.1705C3.74353 28.9595 3.625 28.6734 3.625 28.375V23.875H0.25V29.5C0.25 30.0967 0.487053 30.669 0.90901 31.091C1.33097 31.5129 1.90326 31.75 2.5 31.75H29.5C30.0967 31.75 30.669 31.5129 31.091 31.091C31.5129 30.669 31.75 30.0967 31.75 29.5V23.875H12.625ZM18.8125 29.5C18.3649 29.5 17.9357 29.3222 17.6193 29.0057C17.3028 28.6893 17.125 28.2601 17.125 27.8125C17.125 27.3649 17.3028 26.9357 17.6193 26.6193C17.9357 26.3028 18.3649 26.125 18.8125 26.125C19.2601 26.125 19.6893 26.3028 20.0057 26.6193C20.3222 26.9357 20.5 27.3649 20.5 27.8125C20.5 28.2601 20.3222 28.6893 20.0057 29.0057C19.6893 29.3222 19.2601 29.5 18.8125 29.5ZM23.3125 29.5C22.8649 29.5 22.4357 29.3222 22.1193 29.0057C21.8028 28.6893 21.625 28.2601 21.625 27.8125C21.625 27.3649 21.8028 26.9357 22.1193 26.6193C22.4357 26.3028 22.8649 26.125 23.3125 26.125C23.7601 26.125 24.1893 26.3028 24.5057 26.6193C24.8222 26.9357 25 27.3649 25 27.8125C25 28.2601 24.8222 28.6893 24.5057 29.0057C24.1893 29.3222 23.7601 29.5 23.3125 29.5ZM27.8125 29.5C27.3649 29.5 26.9357 29.3222 26.6193 29.0057C26.3028 28.6893 26.125 28.2601 26.125 27.8125C26.125 27.3649 26.3028 26.9357 26.6193 26.6193C26.9357 26.3028 27.3649 26.125 27.8125 26.125C28.2601 26.125 28.6893 26.3028 29.0057 26.6193C29.3222 26.9357 29.5 27.3649 29.5 27.8125C29.5 28.2601 29.3222 28.6893 29.0057 29.0057C28.6893 29.3222 28.2601 29.5 27.8125 29.5ZM29.5 14.875H2.5C1.90326 14.875 1.33097 15.1121 0.90901 15.534C0.487053 15.956 0.25 16.5283 0.25 17.125V22.75H3.625V20.5H5.875C6.17337 20.5 6.45952 20.3815 6.6705 20.1705C6.88147 19.9595 7 19.6734 7 19.375V17.125H11.5C11.7984 17.125 12.0845 17.2435 12.2955 17.4545C12.5065 17.6655 12.625 17.9516 12.625 18.25V22.75H31.75V17.125C31.75 16.5283 31.5129 15.956 31.091 15.534C30.669 15.1121 30.0967 14.875 29.5 14.875ZM5.875 19.375H3.625L5.875 17.125V19.375ZM18.8125 20.5C18.3649 20.5 17.9357 20.3222 17.6193 20.0057C17.3028 19.6893 17.125 19.2601 17.125 18.8125C17.125 18.3649 17.3028 17.9357 17.6193 17.6193C17.9357 17.3028 18.3649 17.125 18.8125 17.125C19.2601 17.125 19.6893 17.3028 20.0057 17.6193C20.3222 17.9357 20.5 18.3649 20.5 18.8125C20.5 19.2601 20.3222 19.6893 20.0057 20.0057C19.6893 20.3222 19.2601 20.5 18.8125 20.5ZM23.3125 20.5C22.8649 20.5 22.4357 20.3222 22.1193 20.0057C21.8028 19.6893 21.625 19.2601 21.625 18.8125C21.625 18.3649 21.8028 17.9357 22.1193 17.6193C22.4357 17.3028 22.8649 17.125 23.3125 17.125C23.7601 17.125 24.1893 17.3028 24.5057 17.6193C24.8222 17.9357 25 18.3649 25 18.8125C25 19.2601 24.8222 19.6893 24.5057 20.0057C24.1893 20.3222 23.7601 20.5 23.3125 20.5ZM27.8125 20.5C27.3649 20.5 26.9357 20.3222 26.6193 20.0057C26.3028 19.6893 26.125 19.2601 26.125 18.8125C26.125 18.3649 26.3028 17.9357 26.6193 17.6193C26.9357 17.3028 27.3649 17.125 27.8125 17.125C28.2601 17.125 28.6893 17.3028 29.0057 17.6193C29.3222 17.9357 29.5 18.3649 29.5 18.8125C29.5 19.2601 29.3222 19.6893 29.0057 20.0057C28.6893 20.3222 28.2601 20.5 27.8125 20.5Z"
                                                class="group-hover:fill-[#39c0fa] fill-white" />
                                            <path
                                                d="M10.9375 22.75H5.3125C5.16332 22.75 5.02024 22.6907 4.91475 22.5852C4.80926 22.4798 4.75 22.3367 4.75 22.1875C4.75 22.0383 4.80926 21.8952 4.91475 21.7898C5.02024 21.6843 5.16332 21.625 5.3125 21.625H10.9375C11.0867 21.625 11.2298 21.6843 11.3352 21.7898C11.4407 21.8952 11.5 22.0383 11.5 22.1875C11.5 22.3367 11.4407 22.4798 11.3352 22.5852C11.2298 22.6907 11.0867 22.75 10.9375 22.75ZM10.9375 25H5.3125C5.16332 25 5.02024 24.9407 4.91475 24.8352C4.80926 24.7298 4.75 24.5867 4.75 24.4375C4.75 24.2883 4.80926 24.1452 4.91475 24.0398C5.02024 23.9343 5.16332 23.875 5.3125 23.875H10.9375C11.0867 23.875 11.2298 23.9343 11.3352 24.0398C11.4407 24.1452 11.5 24.2883 11.5 24.4375C11.5 24.5867 11.4407 24.7298 11.3352 24.8352C11.2298 24.9407 11.0867 25 10.9375 25ZM10.9375 27.25H5.3125C5.16332 27.25 5.02024 27.1907 4.91475 27.0852C4.80926 26.9798 4.75 26.8367 4.75 26.6875C4.75 26.5383 4.80926 26.3952 4.91475 26.2898C5.02024 26.1843 5.16332 26.125 5.3125 26.125H10.9375C11.0867 26.125 11.2298 26.1843 11.3352 26.2898C11.4407 26.3952 11.5 26.5383 11.5 26.6875C11.5 26.8367 11.4407 26.9798 11.3352 27.0852C11.2298 27.1907 11.0867 27.25 10.9375 27.25Z"
                                                class="group-hover:fill-[#39c0fa] fill-white" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-xl text-blue-600 duration-300 group-hover:text-white">
                                            Total Course</h5>
                                        <h6 class="text-gray-500 duration-300 group-hover:text-white">{{ $courseCount }}
                                        </h6>
                                    </div>
                                </a>

                                <!-- Arts & Design Category -->
                                <a
                                    class="border border-gray-200 rounded-lg py-4 px-5 flex flex-row items-center gap-y-4 gap-x-5 hover:bg-pink-500 hover:border-pink-500 group">
                                    <div
                                        class="bg-pink-500 shrink-0 w-20 sm:w-16 aspect-square rounded-full p-3.5 duration-300 flex items-center justify-center group-hover:bg-white">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_90_1106)">
                                                <path
                                                    d="M34.9453 0H30.6562C30.0733 0 29.6016 0.471727 29.6016 1.05469V2.10938H20.9698C20.5329 0.884391 19.3732 0 18 0C16.6268 0 15.4671 0.884391 15.0302 2.10938H6.39844V1.05469C6.39844 0.471727 5.92671 0 5.34375 0H1.05469C0.471727 0 0 0.471727 0 1.05469V5.27344C0 5.8564 0.471727 6.32812 1.05469 6.32812H5.34375C5.92671 6.32812 6.39844 5.8564 6.39844 5.27344V4.20469H10.73C7.06971 6.49132 4.65623 10.5075 4.36774 15.0057C3.10226 15.42 2.17969 16.598 2.17969 18C2.17969 19.7447 3.59902 21.1641 5.34375 21.1641C7.08848 21.1641 8.50781 19.7447 8.50781 18C8.50781 16.6542 7.65977 15.51 6.47297 15.0534C6.83283 10.0384 10.3321 5.81147 15.1997 4.60547C15.7261 5.62338 16.7771 6.32812 18 6.32812C19.2229 6.32812 20.2739 5.62338 20.8003 4.60547C25.6679 5.8114 29.1672 10.0383 29.527 15.0533C28.3402 15.51 27.4922 16.6542 27.4922 18C27.4922 19.7447 28.9115 21.1641 30.6562 21.1641C32.401 21.1641 33.8203 19.7447 33.8203 18C33.8203 16.598 32.8977 15.42 31.6323 15.0057C31.3438 10.5075 28.9303 6.50538 25.27 4.21875H29.6016V5.27344C29.6016 5.8564 30.0733 6.32812 30.6562 6.32812H34.9453C35.5283 6.32812 36 5.8564 36 5.27344V1.05469C36 0.471727 35.5283 0 34.9453 0ZM25.1754 34.6918C24.6237 33.0037 23.0344 31.7109 21.1641 31.7109H14.8359C12.9656 31.7109 11.3763 33.0037 10.8246 34.6918C10.6119 35.3427 11.1656 36 11.8505 36H24.1495C24.8343 36 25.3881 35.3427 25.1754 34.6918Z"
                                                    class="fill-white group-hover:fill-[#f92596]" />
                                                <path
                                                    d="M27.315 21.6337L19.0547 9.24316V19.2489C20.2797 19.6858 21.1641 20.8455 21.1641 22.2187C21.1641 23.9634 19.7447 25.3828 18 25.3828C16.2553 25.3828 14.8359 23.9634 14.8359 22.2187C14.8359 20.8455 15.7203 19.6858 16.9453 19.2489V9.24316L8.68501 21.6337C8.40587 22.0519 8.46149 22.6091 8.81685 22.9644C10.753 24.9006 11.9907 27.395 12.4683 30.0706C13.201 29.7734 13.9978 29.6015 14.8359 29.6015H21.1641C22.0022 29.6015 22.799 29.7733 23.5317 30.0704C24.0093 27.3947 25.247 24.9006 27.1832 22.9644C27.5385 22.6091 27.5942 22.0519 27.315 21.6337Z"
                                                    class="fill-white group-hover:fill-[#f92596]" />
                                                <path
                                                    d="M18 21.1641C17.4181 21.1641 16.9453 21.6368 16.9453 22.2188C16.9453 22.8007 17.4181 23.2734 18 23.2734C18.5819 23.2734 19.0547 22.8007 19.0547 22.2188C19.0547 21.6368 18.5819 21.1641 18 21.1641Z"
                                                    class="fill-white group-hover:fill-[#f92596]" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_90_1106">
                                                    <rect width="36" height="36"
                                                        class="fill-white group-hover:fill-[#f92596]" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-xl text-blue-600 duration-300 group-hover:text-white">
                                            Total Teacher</h5>
                                        <h6 class="text-gray-500 duration-300 group-hover:text-white">{{ $teacherCount }}
                                        </h6>
                                    </div>
                                </a>

                                <!-- Finance Category -->
                                <a
                                    class="border border-gray-200 rounded-lg py-4 px-5 flex flex-row items-center gap-y-4 gap-x-5 hover:bg-indigo-500 hover:border-indigo-500 group">
                                    <div
                                        class="bg-indigo-500 shrink-0 w-20 sm:w-16 aspect-square rounded-full p-3.5 duration-300 flex items-center justify-center group-hover:bg-white">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M36 33.8906H33.8906V12.6562H27.4922V33.8906H25.3828V21.0938H19.0547V33.8906H16.9453V16.875H10.6172V33.8906H8.50781V23.2031H2.10938V33.8906H0V36H36V33.8906Z"
                                                    class="fill-white group-hover:fill-[#5866eb]" />
                                                <path
                                                    d="M36.0001 8.4375V0H27.4922V2.10938H32.3993L22.2188 12.2195L13.7813 3.78204L0.309082 17.184L1.80041 18.6754L13.7813 6.76484L22.2188 15.2023L33.8907 3.60077V8.4375H36.0001Z"
                                                    class="fill-white group-hover:fill-[#5866eb]" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5
                                            class="font-semibold text-xl text-blue-600 duration-300 group-hover:text-white">
                                            Certificates Issued</h5>
                                        <h6 class="text-gray-500 duration-300 group-hover:text-white">
                                            {{ $certificateCount }} </h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            @endhasanyrole
            {{-- Content Start --}}
            <div class="h-auto overflow-hidden px-6 sm:px-16 bg-white">
                <div class="container mx-auto text-center mt-5">
                    <h2 class="text-indigo-600 text-sm font-semibold tracking-wide uppercase">
                        Our Courses
                    </h2>
                    <div class="flex justify-center items-center mt-2">
                        <div class="w-8 h-1 bg-indigo-600 mr-1"></div>
                        <div class="w-2 h-1 bg-indigo-600 mr-1"></div>
                        <div class="w-1 h-1 bg-indigo-600"></div>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4">
                        NusantaraCode Courses
                    </h1>
                </div>

                <div class="flex flex-wrap justify-center space-x-2 space-y-2 md:space-y-0 md:space-x-2 mb-8 mt-4">
                    <!-- All Button -->
                    <form method="GET" action="{{ route('dashboard') }}" class="flex justify-center">
                        <button type="submit"
                            class="relative px-4 py-2 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
                            <span
                                class="absolute inset-0 w-full h-full bg-purple-700 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                            <span
                                class="relative z-10 {{ !$selectedCategoryId ? 'text-violet-600' : 'text-purple-600' }} group-hover:text-white">
                                All
                            </span>
                        </button>
                    </form>

                    <!-- Category Buttons -->
                    @foreach ($categories as $category)
                        <form method="GET" action="{{ route('dashboard') }}">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <button type="submit"
                                class="mt-2 relative px-4 py-2 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
                                <span
                                    class="absolute inset-0 w-full h-full bg-purple-700 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                                <span
                                    class="relative z-10 {{ $selectedCategoryId == $category->id ? 'text-violet-600' : 'text-purple-600' }} group-hover:text-white">
                                    {{ $category->name }}
                                </span>
                            </button>
                        </form>
                    @endforeach
                </div>

                <!-- Carousel Section -->
                <div class="swiper-container mt-8">
                    <div class="swiper-wrapper">
                        @foreach ($courses as $courseDisplay)
                            <div class="swiper-slide">
                                <div
                                    class="border rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 flex flex-col h-[400px]">
                                    <div class="relative">
                                        <img alt="Course Thumbnail" class="w-full h-48 object-cover"
                                            src="{{ asset('storage/' . $courseDisplay->thumbnail) }}" />
                                        {{-- <div
                                            class="absolute top-2 left-2 bg-yellow-500 text-white px-2 py-1 rounded-full text-sm flex items-center">
                                            <i class="far fa-clock mr-1"></i> 8h 30m
                                        </div> --}}
                                    </div>
                                    <div class="p-4 flex flex-col flex-grow">
                                        <div class="mb-2">
                                            <span
                                                class="bg-gray-200 text-gray-800 text-xs font-semibold py-1 rounded-sm px-2">
                                                Beginner || {{ $courseDisplay->categoriesconn->name ?? 'No Category' }}
                                            </span>
                                            <span class="text-purple-600 text-xl font-bold float-right">
                                                Free
                                            </span>
                                        </div>
                                        <h3 class="text-lg font-semibold mt-2">
                                            <a href="{{ auth()->user()->hasAnyRole(['admin', 'teacher'])
                                                ? route('courses.show', $courseDisplay->id)
                                                : route('coursedetails.show', $courseDisplay->id) }}"
                                                class="text-black hover:text-purple-600">
                                                {{ $courseDisplay->name }}
                                            </a>

                                        </h3>
                                        <div class="flex items-center text-gray-600 text-sm mt-2">
                                            <i class="fas fa-user-friends mr-1"></i>
                                            {{ $courseDisplay->student_course_count ?? 0 }}
                                            <i class="fas fa-book ml-4 mr-1"></i>
                                            {{ $courseDisplay->lessons_count ?? 0 }}
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <img alt="Instructor's profile picture"
                                                class="w-10 h-10 rounded-full mr-2"
                                                src="{{ $courseDisplay->teacherconn->user->avatar ? asset('storage/' . $courseDisplay->teacherconn->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($courseDisplay->teacherconn->user->name) . '&background=random' }}" />
                                            <div>
                                                <p class="text-sm font-semibold">
                                                    {{ $courseDisplay->teacherconn->user->name ?? 'No Teacher' }}
                                                </p>
                                                <div class="flex text-yellow-500">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                </div>
            </div>
            {{-- Content End --}}

            {{-- back to top button --}}
            <div class="fixed bottom-4 right-4 z-50">
                <button id="back-to-top" class="bg-purple-600 text-white rounded-full p-2 focus:outline-none hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                </button>
            </div>

            {{-- script back to top --}}
            <script>
                const backToTop = document.querySelector('#back-to-top');
                backToTop.addEventListener('click', () => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 100) {
                        backToTop.classList.remove('hidden');
                    } else {
                        backToTop.classList.add('hidden');
                    }
                });
                const swiper = new Swiper('.swiper-container', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                        1280: {
                            slidesPerView: 4,
                        },
                    },
                });
            </script>
        </div>
    </div>
</x-app-layout>
<style>
    .carousel {
        transition: transform 0.5s ease;
    }
</style>
