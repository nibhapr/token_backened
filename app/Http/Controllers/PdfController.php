<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PdfController extends Controller
{
    public function generatePDF($tokenNumber)
    {
        $data = ['name' => 'John Doe']; // Replace with your data
        $pdf = Pdf::loadView('pdf.template', $data);
        return response($pdf->output())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="token_' . $tokenNumber . '.pdf"');
    }
}
