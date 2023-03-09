<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Status_pengajuan;
use App\Models\Icon;
use Session;

class CekStatusPengajuanController extends Controller
{
    public function index(Request $request)
    {
       //
    }

    public function create()
    {
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasipublik.cekstatus_pengajuankeberatan', compact('logo'));
    }

    public function store(Request $request) {
        $statuspengajuan = new Status_pengajuan;
        $statuspengajuan->kode_permohonan = $request->kode_permohonan;
        $statuspengajuan->nik_nip = $request->nik_nip;
        $statuspengajuan->save();
        if ($statuspengajuan) {
            Session::flash('success','Status Pengajuan Keberatan Anda Terverifikasi');
            return redirect()->route('cekstatuspengajuan-keberatan.create');
        } else {
            Session::flash('failed','Status Pengajuan Keberatan Anda Gagal Terkirim');
            return redirect()->route('cekstatuspengajuan-keberatan.create');
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
