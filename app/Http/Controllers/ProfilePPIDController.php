<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Berkas;
use Illuminate\Support\Str;
use Session;

class ProfilePPIDController extends Controller
{

    public function profileppid() {
        $profile = Profile::where('kategori_profile', '=', 'profil-ppid')->first();
        $judul = "Update Profil PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function visimisippid() {
        $profile = Profile::where('kategori_profile', '=', 'visi-misi-ppid')->first();
        $judul = "Update Visi Misi PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function baganstruktur() {
        $profile = Profile::where('kategori_profile', '=', 'bagan-struktur-ppid')->first();
        $judul = "Update Bagan Struktur PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function sop() {
        $profile = Profile::where('kategori_profile', '=', 'sop-ppid')->first();
        $judul = "Update SOP PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function tupoksippid() {
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-ppid')->first();
        $judul = "Update Tupoksi PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function skppid() {
        $profile = Profile::where('kategori_profile', '=', 'sk-ppid')->first();
        $judul = "Update SK PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function perwalppid() {
        $profile = Profile::where('kategori_profile', '=', 'perwal-ppid')->first();
        $judul = "Update Perwal PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function maklumatppid() {
        $profile = Profile::where('kategori_profile', '=', 'maklumat-ppid')->first();
        $judul = "Update Maklumat PPID";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function jampelayanan() {
        $profile = Profile::where('kategori_profile', '=', 'jam-pelayanan')->first();
        $judul = "Update Jam Pelayanan";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function skpublik() {
        $profile = Profile::where('kategori_profile', '=', 'sk-daftar-informasi-publik')->first();
        $judul = "Update Daftar SK Informasi Publik";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
    }

    public function skdikecualikan() {
        $profile = Profile::where('kategori_profile', '=', 'sk-daftar-informasi-dikecualikan')->first();
        $judul = "Update Daftar SK Informasi Dikecualikan";
        $profil = Profile::findorfail($profile->id);
        $documents = Berkas::where('profile_id', '=', $profil->id)->get();
        return view('admin.profile.formppid', compact('profile', 'judul', 'documents'));
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
                $pathlampiran = $lampiran->storeAs('berkas/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->profile_id = $profile->id;
                $document->jenis_file = "lampiran";
                $document->path_file = $pathlampiran;
                $document->save();
            }
        }

        if($profile->kategori_profile == "profil-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('profile.ppid.index');
        }
        elseif($profile->kategori_profile == "visi-misi-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('visimisi.ppid.index');
        }
        elseif($profile->kategori_profile == "bagan-struktur-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('bagan.struktur.index');
        }
        elseif($profile->kategori_profile == "sop-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sop.index');
        }
        elseif($profile->kategori_profile == "tupoksi-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('tupoksi.ppid.index');
        }
        elseif($profile->kategori_profile == "sk-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sk.ppid.index');
        }
        elseif($profile->kategori_profile == "perwal-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('perwal.ppid.index');
        }
        elseif($profile->kategori_profile == "maklumat-ppid"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('maklumat.ppid.index');
        }
        elseif($profile->kategori_profile == "jam-pelayanan"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('jam.pelayanan.index');
        }
        elseif($profile->kategori_profile == "sk-daftar-informasi-publik"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sk.publik.index');
        }
        elseif($profile->kategori_profile == "sk-daftar-informasi-dikecualikan"){
            Session::flash('success','Sukses Update Data');
            return redirect()->route('sk.dikecualikan.index');
        }
    }

    public function destroy_berkasppid($berkasppid){
      
        $dokumen = Berkas::findorfail(decrypt($berkasppid));
        $id = $dokumen->profile_id;
        $dokumen->delete();
 
        if($id == "13"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('profile.ppid.index');
        }
        elseif($id == "14"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('visimisi.ppid.index');
        }
        elseif($id == "15"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('bagan.struktur.index');
        }
        elseif($id == "16"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sop.index');
        }
        elseif($id == "17"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('tupoksi.ppid.index');
        }
        elseif($id == "18"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sk.ppid.index');
        }
        elseif($id == "19"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('perwal.ppid.index');
        }
        elseif($id == "20"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('maklumat.ppid.index');
        }
        elseif($id == "21"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('jam.pelayanan.index');
        }
        elseif($id == "22"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sk.publik.index');
        }
        elseif($id == "23"){
            Session::flash('success','Sukses Hapus Data');
            return redirect()->route('sk.dikecualikan.index');
        }
     }
}
