<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Information;
use App\Models\BerkasInformation;
use Illuminate\Support\Str;
use Session;

class InformationController extends Controller
{

    public function informasipublik() {
        $information = Information::where('kategori_informasi', '=', 'daftar-informasi-publik')->first();
        $judul = "Update Data Informasi Publik";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function informasippid() {
        $information = Information::where('kategori_informasi', '=', 'daftar-informasi-publik-ppid-pelaksana')->first();
        $judul = "Update Data Informasi Publik PPID Pelaksana";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function informasiberkala() {
        $information = Information::where('kategori_informasi', '=', 'informasi-secara-berkala')->first();
        $judul = "Update Data Informasi Secara Berkala";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function informasisertamerta() {
        $information = Information::where('kategori_informasi', '=', 'informasi-serta-merta')->first();
        $judul = "Update Data Informasi Serta Merta";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function informasisetiapsaat() {
        $information = Information::where('kategori_informasi', '=', 'informasi-setiap-saat')->first();
        $judul = "Update Data Informasi Setiap Saat";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function informasidikecualikan() {
        $information = Information::where('kategori_informasi', '=', 'informasi-dikecualikan')->first();
        $judul = "Update Data Informasi Dikecualikan";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function soporganisasi() {
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-organisasi')->first();
        $judul = "Update Data SOP Pedoman Pengelolaan Organisasi";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function sopadministrasi() {
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-administrasi')->first();
        $judul = "Update Data SOP Pedoman Pengelolaan Administrasi";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function sopkepegawaian() {
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-kepegawaian')->first();
        $judul = "Update Data SOP Pedoman Kepegawaian";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function sopkeuangan() {
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-keuangan')->first();
        $judul = "Update Data SOP Pedoman Keuangan";
        $informasi = Information::findorfail($information->id);
        $documents = BerkasInformation::where('informasi_id', '=',$informasi->id)->get();
        return view('admin.informasi.form', compact('information', 'judul', 'documents'));
    }

    public function store(Request $request){

        $year = date('Y');
        $month = date('m');
        $day = date('d');
      

        $information = Information::where('kategori_informasi', '=', $request->kategori_informasi)->first();
        
        $informasi = Information::findorfail($information->id);
        $informasi ->kategori_informasi = $request->kategori_informasi;
        $informasi ->title = $request->title;
        $informasi->slug = Str::slug($informasi->title);
        $informasi->deskripsi = $request->deskripsi;
        $informasi->save();

        if($request->hasFile('image')){
            foreach ($request->file('image') as $filegambar) {
                $file_name = $filegambar->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $filegambar->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document= new BerkasInformation();
                $pathgambar = $filegambar->storeAs('image/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->informasi_id = $information->id;
                $document->jenis_file = "gambar";
                $document->path_file = $pathgambar;
                $document->save();
            }
        }

        if($request->hasFile('file_berkas')){
            foreach ($request->file('file_berkas') as $lampiran) {
                $file_name = $lampiran->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $lampiran->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document = new BerkasInformation();
                $pathlampiran = $lampiran->storeAs('file_berkas/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->informasi_id = $information->id;
                $document->jenis_file = "lampiran";
                $document->path_file = $pathlampiran;
                $document->save();
            }
        }


        if($information->kategori_informasi == "daftar-informasi-publik"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.publik.index');
        }
        elseif($information->kategori_informasi == "daftar-informasi-publik-ppid-pelaksana"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.ppid.index');
        }
        elseif($information->kategori_informasi == "informasi-secara-berkala"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.berkala.index');
        }
        elseif($information->kategori_informasi == "informasi-serta-merta"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.serta.merta.index');
        }
        elseif($information->kategori_informasi == "informasi-setiap-saat"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.setiap.saat.index');
        }
        elseif($information->kategori_informasi == "informasi-dikecualikan"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('informasi.dikecualikan.index');
        }
        elseif($information->kategori_informasi == "sop-pedoman-pengelolaan-organisasi"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sop.organisasi.index');
        }
        elseif($information->kategori_informasi == "sop-pedoman-pengelolaan-administrasi"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sop.administrasi.index');
        }
        elseif($information->kategori_informasi == "sop-pedoman-kepegawaian"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sop.kepegawaian.index');
        }
        elseif($information->kategori_informasi == "sop-pedoman-pengelolaan-keuangan"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sop.keuangan.index');
        }
    }

    public function destroy_berkas_informasi($berkasinformasi){
      
        $dokumen = BerkasInformation::findorfail(decrypt($berkasinformasi));
        $id = $dokumen->informasi_id;
        $dokumen->delete();

        if($id == "1"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.publik.index');
        }
        elseif($id == "2"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.ppid.index');
        }
        elseif($id == "3"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.berkala.index');
        }
        elseif($id == "4"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.serta.merta.index');
        }
        elseif($id == "5"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.setiap.saat.index');
        }
        elseif($id == "6"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('informasi.dikecualikan.index');
        }
        elseif($id == "7"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sop.organisasi.index');
        }
        elseif($id == "8"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sop.administrasi.index');
        }
        elseif($id == "9"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sop.kepegawaian.index');
        }
        elseif($id == "10"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sop.keuangan.indexx');
        }
 
        Session::flash('delete','Data Berkas Berhasil Dihapus');
        return redirect()->route('admin.informasi.form', $id);
     }
}
