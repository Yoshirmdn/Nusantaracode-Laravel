<?php

namespace App\Http\Controllers;

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
        $user = Auth::user(); // Use the Auth facade here
        $course = Courses::findOrFail($courseId);

        // Check if the user is enrolled in the course
        if (!$user->coursesToUser->contains($course)) {
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }

        // Generate certificate data
        $certificate = Certificates::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'issue_date' => now(),
            'certificate_path' => '', // Default to an empty string
        ]);

        // Ensure the directory exists
        $certificateDirectory = storage_path('app/public/certificates');
        if (!file_exists($certificateDirectory)) {
            mkdir($certificateDirectory, 0755, true);
        }

        // Generate PDF with landscape orientation
        $pdf = Pdf::loadView('certificates.template', compact('user', 'course', 'certificate'))
            ->setPaper('a4', 'landscape');

        // Save the PDF to storage
        $path = "certificates/{$user->id}_{$course->id}.pdf";
        $pdf->save(storage_path("app/public/{$path}"));

        // Update certificate path in DB
        $certificate->update(['certificate_path' => $path]);

        return response()->download(storage_path("app/public/{$path}"));
    }
}
