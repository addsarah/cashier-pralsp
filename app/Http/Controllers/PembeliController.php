<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PembeliController extends Controller
{
    
    public function index(Request $request)
    {
        $pembeli=Pembeli::orderBy('nama','asc')->simplePaginate(3);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            $pembeli = Pembeli::where('nama','LIKE',"%$filterKeyword")->paginate(1);
        }
        return view('pembeli.index',compact('pembeli'));
    }

    public function create()
    {
        return view('pembeli.create');
    }

   
    public function store(Request $request)
    {
        $simpan = $request->all();
        $validasi = Validator::make($simpan,[
            'nama'=>'required|max:150',
            'email'=>'required|email|max:150|unique:pembelis,email',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|max:250',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('pembeli.create')->withInput()->withErrors($validasi);
        }

        Pembeli::create($simpan);
        return redirect()->route('pembeli.index')->with('success','Pembeli berhasil ditambah');
    }

   
    public function show(string $id)
    {
        $pembeli = Pembeli::findOrfail($id);
        return view('pembeli.show',compact('pembeli'));
    }

   
    public function edit(string $id)
    {
        $pembeli = Pembeli::findOrfail($id);
        return view('pembeli.edit',compact('pembeli'));
    }

    
    public function update(Request $request, string $id)
    {
        $pembeli = Pembeli::findOrfail($id);
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nama'=>'required|max:150',
            'email'=>'required|email|max:150|unique:pembelis,email,'.$id,
            'jenis_kelamin'=>'required',
            'alamat'=>'required|max:250',
        ]);

        if($validasi->fails())
        {
            return redirect()->route('pembeli.create')->withInput()->withErrors($validasi);
        }

        $pembeli->update($data);
        Alert::success('Berhasil', 'Perubahan sudah tersimpan');
        return redirect()->route('pembeli.index')->with('success','Pembeli berhasil ditambah');
    }

    
    public function destroy(string $id)
    {
        $data = Pembeli::findOrfail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data sudah dihapus');
        return redirect()->route('pembeli.index')->with('status','Pembeli berhasil di hapus');
    }
}
