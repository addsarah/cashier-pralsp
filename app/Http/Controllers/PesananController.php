<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['barang', 'pembeli'])->paginate(10);
        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $pembelis = Pembeli::all();
        return view('pesanan.create', compact('barangs', 'pembelis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pembeli' => 'required|exists:pembelis,id',
            'id_barangs' => 'required|array',
            'qty' => 'required|array',
            'tgl_pesan' => 'required|date',
            'metode' => 'required|array',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'total_to_pay' => 'required|numeric|min:0',
        ]);

        $pesanan = Pesanan::create([
            'id_pembeli' => $request->id_pembeli,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'tgl_pesan' => $request->tgl_pesan,
            'metode' => $request->metode,
            'total_amount' => $request->total_amount,
            'discount' => $request->discount,
            'total_to_pay' => $request->total_to_pay,
        ]);

        $pesanan->barangs()->attach(array_combine($request->id_barangs, $request->qtys));

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil disimpan.');
    }


    public function show($id)
    {
        $pesanan = Pesanan::with('barang', 'pembeli')->findOrFail($id);
        return view('pesanan.show', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $barangs = Barang::all();
        $pembelis = Pembeli::all();
        return view('pesanan.edit', compact('pesanan', 'barangs', 'pembelis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pembeli' => 'required|exists:pembelis,id',
            'id_barangs' => 'required|array',
            'qty' => 'required|array',
            'tgl_pesan' => 'required|date',
            'metode' => 'required|array',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'total_to_pay' => 'required|numeric|min:0',
        ]);

        $totalHarga = $request->qty * $request->harga;

        Pesanan::findOrFail($id)->update([
            'id_pembeli' => $request->id_pembeli,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'tgl_pesan' => $request->tgl_pesan,
            'metode' => $request->metode,
            'total_amount' => $request->total_amount,
            'discount' => $request->discount,
            'total_to_pay' => $request->total_to_pay,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Pesanan::findOrFail($id)->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
