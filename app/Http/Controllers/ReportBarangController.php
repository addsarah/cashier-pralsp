<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ReportBarangController extends Controller
{

    //ini method untuk mencetak laporan tabel barang
    public function cetak_barang()
    {
        $R_barang = Barang::orderBy('created_at','DESC')->get();
        $pdf = 'PDF'::loadview('reportbarang.lapbar_pdf', compact('R_barang'));
        return $pdf->stream();
    }
}