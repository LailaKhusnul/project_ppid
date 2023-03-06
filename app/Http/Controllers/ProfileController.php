<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Berkas;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function transparansianggaran() {
        $profile = Profile::where('kategori_profile', '=', 'transparansi-anggaran-kota-madiun')->first();
        $judul = "Update Transparansi Anggaran Kota Madiun";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function madiunprofile() {
        $profile = Profile::where('kategori_profile', '=', 'profil-kota-madiun')->first();
        $judul = "Update Profil Kota Madiun";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function sejarah() {
        $profile = Profile::where('kategori_profile', '=', 'sejarah-kota-madiun')->first();
        $judul = "Update Sejarah Kota Madiun";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function geografis() {
        $profile = Profile::where('kategori_profile', '=', 'letak-geografis')->first();
        $judul = "Update Letak Geografis";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function profilepemerintah() {
        $profile = Profile::where('kategori_profile', '=', 'profil-pemerintah')->first();
        $judul = "Update Profil Pemerintah";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function profilepejabat() {
        $profile = Profile::where('kategori_profile', '=', 'profil-pejabat')->first();
        $judul = "Update Profil Pejabat";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function lhkpnpejabat() {
        $profile = Profile::where('kategori_profile', '=', 'lhkpn-pejabat')->first();
        $judul = "Update LHKPN Pejabat";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function visimisi() {
        $profile = Profile::where('kategori_profile', '=', 'visi-misi')->first();
        $judul = "Update Visi Misi";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function strukturpemerintah() {
        $profile = Profile::where('kategori_profile', '=', 'struktur-organisasi-pemerintah')->first();
        $judul = "Update Struktur Organisasi Pemerintah";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function strukturunitkerja() {
        $profile = Profile::where('kategori_profile', '=', 'struktur-organisasi-unit-kerja')->first();
        $judul = "Update Struktur Organisasi Unit Kerja";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function tupoksipemerintah() {
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-pemerintah')->first();
        $judul = "Update Tupoksi Pemerintah";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function tupoksiunitkerja() {
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-unit-kerja')->first();
        $judul = "Update Tupoksi Unit Kerja";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function agenda() {
        $profile = Profile::where('kategori_profile', '=', 'agenda-kerja-kegiatan-pimpinan')->first();
        $judul = "Update Agenda Kerja Kegiatan Pimpinan";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.form', compact('profile', 'judul', 'documents'));
    }

    public function store(Request $request){

        $year = date('Y');
        $month = date('m');
        $day = date('d');


        $profile = Profile::where('kategori_profile', '=', $request->kategori_profile)->first();

        $profil = Profile::findorfail($profile->id);
        $profil ->kategori_profile = $request->kategori_profile;
        $profil ->title = $request->title;
        $profil->slug = Str::slug($profil->title);
        $profil->deskripsi = $request->deskripsi;
        $profil->save();

        if($request->hasFile('image')){
            foreach ($request->file('image') as $filegambar) {
                $file_name = $filegambar->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $filegambar->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document= new Berkas();
                $pathgambar = $filegambar->storeAs('image/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->profile_id = $profile->id;
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


                $document = new Berkas();
                $pathlampiran = $lampiran->storeAs('file_berkas/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->profile_id = $profile->id;
                $document->jenis_file = "lampiran";
                $document->path_file = $pathlampiran;
                $document->save();
            }
        }


        if($profile->kategori_profile == "profil-kota-madiun"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('madiunprofile.index');
        }
        elseif($profile->kategori_profile == "sejarah-kota-madiun"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sejarah.index');
        }
        elseif($profile->kategori_profile == "letak-geografis"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('geografis.index');
        }
        elseif($profile->kategori_profile == "profil-pemerintah"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('profil.pemerintah.index');
        }
        elseif($profile->kategori_profile == "profil-pejabat"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('profil.pejabat.index');
        }
        elseif($profile->kategori_profile == "lhkpn-pejabat"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('lhkpn.index');
        }
        elseif($profile->kategori_profile == "visi-misi"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('visimisi.index');
        }
        elseif($profile->kategori_profile == "struktur-organisasi-pemerintah"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('struktur.pemerintah.index');
        }
        elseif($profile->kategori_profile == "struktur-organisasi-unit-kerja"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('struktur.unitkerja.index');
        }
        elseif($profile->kategori_profile == "tupoksi-pemerintah"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('tupoksi.pemerintah.index');
        }
        elseif($profile->kategori_profile == "tupoksi-unit-kerja"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('tupoksi.unitkerja.index');
        }
        elseif($profile->kategori_profile == "agenda-kerja-kegiatan-pimpinan"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('agenda.index');
        }
        elseif($profile->kategori_profile == "transparansi-anggaran-kota-madiun"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('transparansi.index');
        }
        
    }

    public function destroy_berkas($berkasprofile){

        $dokumen = Berkas::findorfail(decrypt($berkasprofile));
        $id = $dokumen->profile_id;
        $dokumen->delete();

        if($id == "1"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('madiunprofile.index');
        }
        elseif($id == "2"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sejarah.index');
        }
        elseif($id == "3"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('geografis.index');
        }
        elseif($id == "4"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('profil.pemerintah.index');
        }
        elseif($id == "5"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('profil.pejabat.index');
        }
        elseif($id == "6"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('lhkpn.index');
        }
        elseif($id == "7"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('visimisi.index');
        }
        elseif($id == "8"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('struktur.pemerintah.index');
        }
        elseif($id == "9"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('struktur.unitkerja.index');
        }
        elseif($id == "10"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('tupoksi.pemerintah.index');
        }
        elseif($id == "11"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('tupoksi.unitkerja.index');
        }
        elseif($id == "12"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('agenda.index');
        }
        elseif($id == "24"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('transparansi.index');
        }

        Session::flash('delete','Data Berkas Berhasil Dihapus');
        return redirect()->route('admin.profile.form', $id);
     }
}
