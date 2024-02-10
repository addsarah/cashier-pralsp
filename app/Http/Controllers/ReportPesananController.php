<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class ReportPesananController extends Controller
{
    //ini method untuk mencetak laporan tabel pesanan
    public function cetak_pesanan()
    {
        $R_pesanan = Pesanan::orderBy('created_at','DESC')->get();
        $pdf = 'PDF'::loadview('reportpesanan.lappes_pdf', compact('R_pesanan'));
        return $pdf->stream();
    }

    
}
