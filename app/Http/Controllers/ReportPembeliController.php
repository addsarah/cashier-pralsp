<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ReportpembeliController extends Controller
{

    //ini method untuk mencetak laporan tabel pembeli
    public function cetak_pembeli()
    {
        $R_pembeli = Pembeli::orderBy('created_at','DESC')->get();
        $pdf = 'PDF'::loadview('reportpembeli.lappem_pdf', compact('R_pembeli'));
        return $pdf->stream();
    }
}