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
            <div class="h-screen overflow-hidden px-16 bg-white">
                <div class="container mx-auto text-center mt-5">
                    <h2 class="text-indigo-600 text-sm font-semibold tracking-wide uppercase">Our Courses</h2>
                    <div class="flex justify-center items-center mt-2">
                        <div class="w-8 h-1 bg-indigo-600 mr-1"></div>
                        <div class="w-2 h-1 bg-indigo-600 mr-1"></div>
                        <div class="w-1 h-1 bg-indigo-600"></div>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 mt-4">NusantaraCode Courses</h1>
                </div>
                <div class="flex justify-center space-x-2 mb-8 mt-4">
                    <!-- Tombol All -->
                    <form method="GET" action="{{ route('dashboard') }}">
                        <button type="submit"
                            class="relative px-4 py-2 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
                            <span
                                class="absolute inset-0 w-full h-full bg-purple-700 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                            <span
                                class="relative z-10 {{ !$selectedCategoryId ? 'text-purple-500' : 'text-purple-600' }} group-hover:text-white">
                                All
                            </span>
                        </button>
                    </form>

                    <!-- Tombol Kategori -->
                    @foreach ($categories as $category)
                        <form method="GET" action="{{ route('dashboard') }}">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <button type="submit"
                                class="relative px-4 py-2 border border-purple-600 rounded-full overflow-hidden group transition duration-300 ease-in-out">
                                <span
                                    class="absolute inset-0 w-full h-full bg-purple-700 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                                <span
                                    class="relative z-10 {{ $selectedCategoryId == $category->id ? 'text-white' : 'text-purple-600' }} group-hover:text-white">
                                    {{ $category->name }}
                                </span>
                            </button>
                        </form>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($courses as $courseDisplay)
                        <div class="border rounded-lg shadow-lg overflow-hidden">
                            <div class="relative">
                                <img alt="Group of people working on a laptop" class="w-full h-48 object-cover"
                                    height="400" src="{{ asset('storage/' . $courseDisplay->thumbnail) }}"
                                    width="600" />
                                <div
                                    class="absolute top-2 left-2 bg-yellow-500 text-white px-2 py-1 rounded-full text-sm flex items-center">
                                    <i class="far fa-clock mr-1">
                                    </i>
                                    8h 30m
                                </div>
                            </div>
                            <div class="p-4">
                                <span class="bg-gray-200 text-gray-800 text-xs font-semibold py-1 rounded-sm px-2">
                                    Beginner || {{ $courseDisplay->categoriesconn->name ?? 'No Category' }}
                                </span>
                                <span class="text-purple-600 text-xl font-bold float-right">
                                    Free
                                </span>
                                <h3 class="text-lg font-semibold mt-2">
                                    <a href="{{ route('coursedetails.show', $courseDisplay->id) }}"
                                        class="text-black hover:text-purple-600">
                                        {{ $courseDisplay->name }}
                                    </a>
                                </h3>

                                <div class="flex items-center text-gray-600 text-sm mt-2">
                                    <i class="fas fa-user-friends mr-1">
                                    </i>
                                    {{ $courseDisplay->student_course_count ?? 0 }}
                                    <i class="fas fa-book ml-4 mr-1">
                                    </i>
                                    {{ $courseDisplay->lessons_count ?? 0 }}
                                </div>
                                <div class="flex items-center mt-4">
                                    <img alt="Instructor's profile picture" class="w-10 h-10 rounded-full mr-2"
                                        height="100"
                                        src="{{ $courseDisplay->teacherconn->user->avatar ? asset('storage/' . $courseDisplay->teacherconn->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($courseDisplay->teacherconn->user->name) . '&background=random' }}"
                                        width="100" />
                                    <div>
                                        <p class="text-sm font-semibold">
                                            {{ $courseDisplay->teacherconn->user->name ?? 'No Teacher' }}
                                        </p>
                                        <div class="flex text-yellow-500">
                                            <i class="fas fa-star">
                                            </i>
                                            <i class="fas fa-star">
                                            </i>
                                            <i class="fas fa-star">
                                            </i>
                                            <i class="fas fa-star">
                                            </i>
                                            <i class="fas fa-star-half-alt">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Content End --}}
            {{-- footer start --}}
            <section class="bg-white">
                <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
                    <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                        <div class="px-5 py-2">
                            <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                About
                            </a>
                        </div>
                        <div class="px-5 py-2">
                            <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                Blog
                            </a>
                        </div>
                        <div class="px-5 py-2">
                            <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                Team
                            </a>
                    </nav>
                    <div class="flex justify-center mt-8 space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">GitHub</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Dribbble</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <p class="mt-8 text-base leading-6 text-center text-gray-400">
                        © 2024 Ilmu Padi. All rights reserved.
                    </p>
                </div>
            </section>
            {{-- footer end --}}

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
            </script>
        </div>
    </div>
</x-app-layout>
<style>
    .carousel {
        transition: transform 0.5s ease;
    }
</style>
