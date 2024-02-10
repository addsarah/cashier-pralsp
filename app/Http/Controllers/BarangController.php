<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    
    public function index(Request $request)
    {
        $barang=Barang::orderBy('nama_barang','asc')->simplePaginate(3);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            $barang = Barang::where('nama_barang','LIKE',"%$filterKeyword")->paginate(1);
        }
        return view('barang.index',compact('barang'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang.create', compact('barang'));
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nama_barang'=>'required|max:200',
            'gambar'=>'required|image|mimes:jpeg,jpg,png|max:2048',
            'harga'=>'required|numeric',
            'stok'=>'required|numeric',
        ]);
        if($validator->fails())
        {
            return redirect()->route('barang.create')->withInput()->withErrors($validator);
        }

        $gambar = $request->file('gambar');
        $extention = $gambar->getClientOriginalExtension();
        
        if($request->file('gambar')->isValid()){
            $namafoto = "barang/".date('YmdHis').".". $extention;
            $extention;
            $upload_path = "uploads/barang";
            $request->file('gambar')->move($upload_path,$namafoto);
            $input['gambar'] = $namafoto;
        }

        Barang::create($input);
        return redirect()->route('barang.index')->with('success','Barang berhasil ditambah');
    }

   
    public function show(string $id)
    {
        $barang = Barang::findOrfail($id);
        return view('barang.show',compact('barang'));
    }

   
    public function edit(string $id)
    {
        $barang = Barang::findOrfail($id);
        return view('barang.edit',compact('barang'));
    }

    
    public function update(Request $request, $id)
    {
         // ini perintah untuk update data
         $barang = Barang::findOrfail($id);
         $input = $request->all();
         $validator = Validator::make($input,[
             'nama_barang' =>'required|max:150',
             'harga' =>'required|numeric',
             'stok' =>'required|numeric',
             'gambar' =>'required|image|mimes:jpeg,jpg,png|max:2048',
         ]);

        if($validator->fails())
        {
            return redirect()->route('barang.edit',[$id])->withInput()->withErrors($validator);
        }

        if($request->hasFile('gambar')){
            if($request->file('gambar')->isValid())
            {
                Storage::disk('upload')->delete($barang->gambar);
                $gambar = $request->file('gambar');

                $extention = $gambar->getClientOriginalExtension();
                $namaFoto = "barang/".date('YmdHis').".".$extention;
                $upload_path = 'uploads/barang';
                $request->file('gambar')->move($upload_path,$namaFoto);
                $input['gambar'] = $namaFoto;
            }
        }

        $barang->update($input);
        // alert()->success('Edit','Data Sudah Di Edit');
        return redirect()->route('barang.index')->with('success','barang berhasil di edit');
    }

    public function destroy(string $id)
    {
        $data = Barang::findOrfail($id);
        $data->delete();
        return redirect()->route('barang.index')->with('status','Barang berhasil di hapus');
    }
}