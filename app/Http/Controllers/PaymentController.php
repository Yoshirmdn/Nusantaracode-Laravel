<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificates;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function payCertificate($courseId)
    {
        $user = Auth::user();
        $course = Courses::findOrFail($courseId);

        // 1. Cek apakah sudah ada certificate row untuk (user_id, course_id).
        //    Jika belum, buat dulu. Jika sudah ada dan payment_status = success, skip.
        $certificate = Certificates::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($certificate && $certificate->payment_status === 'success') {
            // Sudah pernah bayar => langsung arahkan ke generate certificate
            return redirect()
                ->route('certificate.generate', $courseId)
                ->with('info', 'You already paid, please generate your certificate.');
        }

        if (!$certificate) {
            // Buat row di tabel certificates
            $certificate = Certificates::create([
                'user_id'          => $user->id,
                'course_id'        => $course->id,
                'certificate_path' => '',        // belum ada
                'issue_date'       => now(),     // atau null, nanti di-update
                'price'            => 50000,     // contoh harga
                'payment_status'   => 'pending', // default
            ]);
        }

        // 2. Setup Midtrans
        Config::$serverKey     = config('services.midtrans.server_key');
        Config::$isProduction  = config('services.midtrans.is_production');
        Config::$is3ds         = config('services.midtrans.is_3ds'); // opsional

        // 3. Generate order_id unik, lalu simpan di kolom 'order_id'
        $orderId = 'ORDER-' . uniqid();

        // Update record di DB
        $certificate->order_id = $orderId;
        $certificate->payment_status = 'pending';
        $certificate->save();

        // 4. Set parameter request untuk Snap
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $certificate->price, // ambil dari kolom price
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
            ],
        ];

        // 5. Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        // 6. Return view yang memanggil Snap popup
        return view('payment.pay_certificate', compact('snapToken', 'course'));
    }
    public function updateStatus(Request $request)
    {
        $orderId = $request->input('order_id');

        // Cari data certificate
        $certificate = \App\Models\Certificates::where('order_id', $orderId)->first();

        if (!$certificate) {
            return response()->json([
                'status' => 'error',
                'message' => 'Certificate not found for order_id: ' . $orderId
            ], 404);
        }

        // Update status (langsung success, hanya demo - real-nya pakai notif midtrans)
        $certificate->payment_status = 'success';
        $certificate->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Payment status updated to success'
        ]);
    }
}
