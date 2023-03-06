<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PPIDPelaksana;
use Session;

class PPIDPelaksanaController extends Controller
{
    public function index() 
    {
        $ppid_pelaksana = PPIDPelaksana::all();
        $judul = "Data PPID Pelaksana";
        return view('admin.ppid_pelaksana.index', compact('ppid_pelaksana', 'judul'));
    }

    public function create()
    {
        $ppid_pelaksana = PPIDPelaksana::all();
        $judul = "Tambah Data PPID Pelaksana";
        return view('admin.ppid_pelaksana.create', compact('ppid_pelaksana', 'judul'));
    }

    public function store(Request $request)
    {
        $ppid_pelaksana = new PPIDPelaksana;
        $ppid_pelaksana->nama_opd = $request->nama_opd;
        $ppid_pelaksana->alamat = $request->alamat;
        $ppid_pelaksana->telepon = $request->telepon;
        $ppid_pelaksana->user_id = Auth::id();
        $ppid_pelaksana->save();
        if ($ppid_pelaksana) {
            Session::flash('success','Data PPID Pelaksana Berhasil Ditambahkan');
            return redirect()->route('ppidpelaksana.index');
        } else {
            Session::flash('failed','Data PPID Pelaksana Gagal Ditambahkan');
            return redirect()->route('ppidpelaksana.index');
        }
    } 

    public function edit($id){
        $ppid_pelaksana = PPIDPelaksana::find($id);
        $judul = "Update Data PPID Pelaksana";
        return view('admin.ppid_pelaksana.edit',compact('ppid_pelaksana', 'judul'));
    }

    public function update(Request $request, $id)
    {
            $ppid_pelaksana = PPIDPelaksana::find($id);
            $ppid_pelaksana->nama_opd = $request->nama_opd;
            $ppid_pelaksana->alamat = $request->alamat;
            $ppid_pelaksana->telepon = $request->telepon;
            $ppid_pelaksana->user_id = Auth::id();
            $ppid_pelaksana->save();

        if ($ppid_pelaksana) {
                Session::flash('update','Update Data PPID Pelaksana Berhasil');
                return redirect()->route('ppidpelaksana.index');
            } else {
                Session::flash('failed','Update Data PPID Pelaksana Gagal');
                return redirect()->route('ppidpelaksana.index');
            }
    }

    public function destroy($id) {
        PPIDPelaksana::find($id)->delete();
        Session::flash('delete','Data PPID Pelaksana Berhasil Dihapus');
        return redirect()->route('ppidpelaksana.index');
    }


}
