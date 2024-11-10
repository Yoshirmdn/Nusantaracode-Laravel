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
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2">Code
                            Playground</a>
                    </div>
                </li>
            </ol>
        </nav>

    </x-slot>

    <body class="">
        <div class="p-4 bg-[#E5DAD3]">
            <div class="mx-auto p-4">
                <a href="#" class="text-white bg-slate-700 p-2 rounded-lg hover:bg-slate-500">
                    <i class="fa-solid fa-backward mb-5"></i> Kembali
                </a>

                <!-- code editor -->
                <div class="grid grid-cols-3 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <h2 class="text-xl font-light"><i class="fa-brands fa-html5"></i> HTML</h2>
                        <div class="relative p-1 bg-gradient-to-b from-orange-500 to-blue-500 rounded-md">
                            <textarea id="htmlCode" class="w-full h-96 border bg-[#EFEBE8] rounded-md p-2 text-gray-900" placeholder="HTML"></textarea>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-light "><i class="fa-brands fa-css3-alt"></i> CSS</h2>
                        <div class="relative p-1 bg-gradient-to-t from-orange-500 to-blue-500 rounded-md">
                            <textarea id="cssCode" class="w-full h-96 border bg-[#EFEBE8] rounded-md p-2 text-gray-900" placeholder="CSS"></textarea>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-light "><i class="fa-brands fa-square-js"></i> JavaScript</h2>
                        <div class="relative p-1 bg-gradient-to-b from-orange-500 to-blue-500 rounded-md">
                            <textarea id="jsCode" class="w-full h-96 border bg-[#EFEBE8] rounded-md p-2 text-gray-900" placeholder="JavaScript"></textarea>
                        </div>
                    </div>
                </div>
                <!-- result -->
                <h2 class="text-2xl font-light mb-2 mt-4">Result :</h2>
                <div id="result" class="mt-4 border border-gray-300 bg-white rounded-md p-4 h-32"></div>
            </div>
        </div>

        <script>
            var htmlCode = document.getElementById('htmlCode');
            var cssCode = document.getElementById('cssCode');
            var jsCode = document.getElementById('jsCode');
            var resultFrame = document.getElementById('result');

            function refreshResult() {
                resultFrame.innerHTML = htmlCode.value + '<style>' + cssCode.value + '</style>';
                var scriptElement = document.createElement('script');
                scriptElement.textContent = jsCode.value;
                resultFrame.appendChild(scriptElement);
            }

            // Refresh result on initial load
            refreshResult();

            // Refresh result on input change
            htmlCode.addEventListener('input', refreshResult);
            cssCode.addEventListener('input', refreshResult);
            jsCode.addEventListener('input', refreshResult);
        </script>
    </body>
</x-app-layout>
