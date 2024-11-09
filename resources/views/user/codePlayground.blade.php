<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Code Playground') }}
        </h2>
    </x-slot>


    <body class="bg-[#E5DAD3]">
        <div class="p-4 mt-10">
            <div class="mx-auto p-4">
                <a href="#"
                    class="bg-black/20 p-2 rounded-lg text-white hover:bg-black/30 backdrop-blur-md border border-white/20">
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
