<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\Icon;
use Session;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
       //
    }

    public function create()
    {
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasipublik.pengajuan', compact('logo'));
    }

    public function store(Request $request) {
        $pengajuan = new pengajuan;
        $pengajuan->kode_permohonan = $request->kode_permohonan;
        $pengajuan->nik_nip = $request->nik_nip;
        $pengajuan->save();
        if ($pengajuan) {
            Session::flash('success','Pengajuan Keberatan Anda Berhasil Terkirim');
            return redirect()->route('pengajuan-keberatan.create');
        } else {
            Session::flash('failed','Pengajuan Keberatan Anda Gagal Terkirim');
            return redirect()->route('pengajuan-keberatan.create');
        }
    }

    public function show($id)
    {
        //   
    }

    public function destroy($id)
    {
            // 
    }

}

