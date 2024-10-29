<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class ReporteIngresoController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::all();

        return view('reportes.ingresos', compact('ingresos'));
    }

    public function exportarPDF()
{
    $ingresos = Ingreso::all();

    $pdf = app('dompdf.wrapper');

    $pdf->loadView('reportes.pdf_ingresos', compact('ingresos'));

    return $pdf->download('reporte_ingresos.pdf');
}
}
