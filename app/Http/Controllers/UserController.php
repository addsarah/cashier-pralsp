<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $user=User::orderBy('name','asc')->simplePaginate(3);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            $user = User::where('name','LIKE',"%$filterKeyword")->paginate(1);
        }
        return view('user.index',compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

   
    public function store(Request $request)
    {
        $simpan = $request->all();
        $validasi = Validator::make($simpan,[
            'name'=>'required|max:150',
            'email'=>'required|email|max:150|unique:users',
            'password'=>'required|min:7',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        $simpan['password'] = bcrypt($simpan['password']);
        User::create($simpan);
        Alert::success('Simpan', 'Data sudah tersimpan');
        return redirect()->route('user.index')->with('success','User berhasil ditambah');
    }

   
    public function show(string $id)
    {
        $user = User::findOrfail($id);
        return view('user.show',compact('user'));
    }

   
    public function edit(string $id)
    {
        $user = User::findOrfail($id);
        return view('user.edit',compact('user'));
    }

    
    public function update(Request $request, string $id)
    {
        $user = User::findOrfail($id);
        $data = $request->all();
        $validasi = Validator::make($data,[
            'name'=>'required|max:150',
            'email'=>'required|email|max:150|unique:users,email,'.$id,
            'password'=>'required|min:7',
        ]);

        if($validasi->fails())
        {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        if($request->input('password'))
        {
            $data['password'] = bcrypt($data['password']);
        } else 
        {
            $data = Arr::except($data,['password']);
        }
        $user->update($data);
        Alert::success('Berhasil', 'Data berhasil diedit');
        return redirect()->route('user.index')->with('success','User berhasil ditambah');
    }

    
    public function destroy(string $id)
    {
        $data = User::findOrfail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data sudah dihapus');
        return redirect()->route('user.index')->with('status','User berhasil di hapus');
    }
}
