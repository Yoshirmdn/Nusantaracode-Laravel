{{-- resources/views/payment/pay_certificate.blade.php --}}
<x-app-layout>
    {{-- Slot header jika diperlukan --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bayar Course: ') . $course->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 sm:p-8 shadow sm:rounded-lg">
                <h1 class="text-2xl font-bold mb-4">Bayar Course: {{ $course->name }}</h1>

                @php
                    // Ambil data certificate user untuk course ini
                    $certificate = \App\Models\Certificates::where('user_id', Auth::id())
                        ->where('course_id', $course->id)
                        ->first();
                @endphp

                {{-- Tombol "Pay Now" (untuk memanggil Snap) --}}
                <button id="pay-button"
                    class="inline-block px-5 py-3 rounded-md font-medium bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Pay Now
                </button>

                <div class="mt-6">
                    @if ($certificate && $certificate->payment_status === 'success')
                        {{-- Jika sudah sukses bayar, tampilkan tombol DOWNLOAD --}}
                        <a href="{{ route('certificate.generate', ['courseId' => $course->id]) }}"
                            class="inline-flex items-center gap-2 px-5 py-3 bg-green-600 text-white rounded-md font-medium
                                   hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <i class="fa-solid fa-download"></i>
                            Download Certificate
                        </a>
                    @else
                        {{-- Jika belum bayar atau payment_status != success, tetap pakai tombol "Generate" --}}
                        <a href="{{ route('certificate.generate', ['courseId' => $course->id]) }}"
                            class="inline-flex items-center gap-2 px-5 py-3 bg-yellow-600 text-white rounded-md font-medium
                                   hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <i class="fa-solid fa-award"></i>
                            Generate Certificate
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Script Snap di bagian paling bawah --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <script>
        document.getElementById('pay-button').onclick = function() {
            // snapToken dari controller
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Payment successful!");
                    console.log(result);
                    // Arahkan user ke manapun; bisa ke generate certificate
                    window.location.href = "{{ route('certificate.generate', $course->id) }}";
                },
                onPending: function(result) {
                    alert("Waiting your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert("You closed the popup without finishing the payment");
                }
            })
        }
    </script>
</x-app-layout>
