<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function studSummary(Student $student){
        $pdf = Pdf::loadView('pdf.studentInfo',[
            'student'=>$student
        ]);

        return $pdf->stream();
    }
}
