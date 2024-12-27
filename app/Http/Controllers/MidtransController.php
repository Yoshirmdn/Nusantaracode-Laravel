<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Certificates;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$is3ds        = config('services.midtrans.is_3ds');

        $notification = new Notification();

        $status       = $notification->transaction_status;
        $type         = $notification->payment_type;
        $orderId      = $notification->order_id;
        $fraud        = $notification->fraud_status ?? null;

        // Cari data certificate
        $certificate = Certificates::where('order_id', $orderId)->first();

        if (!$certificate) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Order ID not found in certificates table'
            ], 404);
        }

        // Default payment_status
        $paymentStatus = 'pending';

        switch ($status) {
            case 'capture':
                // mostly for credit card
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $paymentStatus = 'challenge';
                    } else {
                        $paymentStatus = 'success';
                    }
                }
                break;

            case 'settlement':
                // Transfer bank dsb
                $paymentStatus = 'success';
                break;

            case 'deny':
            case 'expire':
            case 'cancel':
                $paymentStatus = $status; // isinya 'deny' / 'expire' / 'cancel'
                break;

            default:
                // 'pending' atau status lain
                $paymentStatus = $status;
                break;
        }

        // Update kolom payment_status di certificates
        $certificate->payment_status = $paymentStatus;
        $certificate->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Notification processed'
        ]);
    }
}
