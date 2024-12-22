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
        <div class="bg-gray-200">
            {{-- Hero Start --}}
            {{-- <section class="bg-white text-gray-100 shadow-lg">
                <div
                    class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
                    <div
                        class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                        <img src="{{ asset('img/news-details-img-2.jpg') }}" alt=""
                            class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                    </div>
                    <div
                        class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                        @role('admin')
                            <p class="text-lg font-bold text-green-600">Hello Admin!</p>
                            @elserole('teacher')
                            <p class="text-lg font-bold text-blue-600">Hello, {{ Auth::user()->name }}! You're a
                                teacher.</p>
                            @elserole('student')
                            <p class="text-lg font-bold text-purple-600">Hello, {{ Auth::user()->name }}! You're a
                                student.</p>
                        @endrole
                        <h1 class="text-3xl font-bold text-gray-800 sm:text-6xl">Belajar Koding dengan
                            <span class="text-violet-400">Nusantara</span>Code
                        </h1>
                        <p class="mt-6 mb-8 text-gray-600 text-lg sm:mb-12">Tingkatkan kemampuan programming Anda
                            <br class="hidden md:inline lg:hidden">melalui media pembelajaran berbahasa Indonesia
                            dengan
                            nuansa budaya yang menginspirasi
                        </p>
                        <div
                            class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                            <a rel="noopener noreferrer" href="#"
                                class="px-8 py-3 text-lg font-semibold rounded bg-purple-500 hover:bg-violet-400 text-white">Mulai
                                Sekarang</a>
                            <a rel="noopener noreferrer" href="#"
                                class="px-8 py-3 text-lg font-semibold border rounded bg-gray-400 hover:bg-gray-200 border-gray-400 text-gray-700">Jelajah
                                Course</a>
                        </div>
                    </div>
                </div>
            </section> --}}
            <section class="bg-gray-100 pt-[120px] pb-[190px] relative z-[1] overflow-hidden">
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
                                class="relative px-4 py-2 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
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
                                        <div
                                            class="absolute top-2 left-2 bg-yellow-500 text-white px-2 py-1 rounded-full text-sm flex items-center">
                                            <i class="far fa-clock mr-1"></i> 8h 30m
                                        </div>
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
                                            <a href="{{ route('coursedetails.show', $courseDisplay->id) }}"
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
