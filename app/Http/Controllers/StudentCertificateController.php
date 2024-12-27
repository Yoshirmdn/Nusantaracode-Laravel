<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Certificates;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class StudentCertificateController extends Controller
{
    public function generateCertificate(Request $request, $courseId)
    {
        $user = Auth::user();
        $course = Courses::findOrFail($courseId);

        // 1. Cari data certificate di DB
        $certificate = Certificates::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        // Kalau belum ada, suruh user "beli"/"buat" dulu
        if (!$certificate) {
            return redirect()
                ->route('payment.payCertificate', $courseId)
                ->with('error', 'Certificate record not found, please pay first.');
        }

        // 2. Cek payment_status
        if ($certificate->payment_status !== 'success') {
            return redirect()
                ->route('payment.payCertificate', $courseId)
                ->with('error', 'You must complete payment before generating certificate.');
        }

        // 3. (Opsional) Cek apakah sudah pernah generate PDF?
        //    Kalau certificate_path masih kosong, generate; kalau sudah ada, bisa re-generate, dsb.

        // 4. Generate PDF
        $pdf = Pdf::loadView('certificates.template', compact('user', 'course', 'certificate'))
            ->setPaper('a4', 'landscape');

        // Lokasi penyimpanan
        $path = "certificates/Certificate-of-completion-{$user->name}-{$course->name}.pdf";
        $pdf->save(storage_path("app/public/{$path}"));

        // Update path di DB
        $certificate->certificate_path = $path;
        $certificate->issue_date = now(); // set issue date ke hari ini, misal
        $certificate->save();

        // 5. Return file ke user
        return response()->download(storage_path("app/public/{$path}"));
    }
}
