<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class ReporteEgresoController extends Controller
{
    public function index()
    {
        $egresos = Egreso::all();

        return view('reportes.egresos', compact('egresos'));
    }

    public function exportarPDF()
{
    $egresos = Egreso::all();

    $pdf = app('dompdf.wrapper');

    $pdf->loadView('reportes.pdf_egresos', compact('egresos'));

    return $pdf->download('reporte_egresos.pdf');
}
}
