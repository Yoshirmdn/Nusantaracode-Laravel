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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Parent Section</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Outer Section</h1>
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <h1>Inner Section</h1>
                    @role('admin')
                        <p class="text-lg font-bold text-green-600">Hello Admin!</p>
                        @elserole('teacher')
                        <p class="text-lg font-bold text-blue-600">Hello, {{ Auth::user()->name }}! You're a teacher.</p>
                        @elserole('student')
                        <p class="text-lg font-bold text-purple-600">Hello, {{ Auth::user()->name }}! You're a student.</p>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
