<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Berkas;
use App\Models\Icon;
use App\Models\Information;
use App\Models\BerkasInformation;
use App\Models\PPIDPelaksana;


class MainController extends Controller
{

    public function sejarah_madiun() {
    
        $profile = Profile::where('kategori_profile', '=', 'sejarah-kota-madiun')->first();
        $berkas = Berkas::all()
                 -> where('profile_id', '=', '2');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.sejarah', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function geografis_madiun() {
    
        $profile = Profile::where('kategori_profile', '=', 'letak-geografis')->first();
        $berkas = Berkas::all()
                 -> where('profile_id', '=', '3');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.geografis', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function transparansianggaran() {
    
        $profile = Profile::where('kategori_profile', '=', 'transparansi-anggaran-kota-madiun')->first();
        $berkas = Berkas::all()
                 -> where('profile_id', '=', '24');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.transparansi', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function profil_pemerintah() {
    
        $profile = Profile::where('kategori_profile', '=', 'profil-pemerintah')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '4');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.pemerintah', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function profil_kota_madiun() {
    
        $profile = Profile::where('kategori_profile', '=', 'profil-kota-madiun')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '1');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.pemerintah', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function profil_pejabat() {
    
        $profile = Profile::where('kategori_profile', '=', 'profil-pejabat')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '5');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.pejabat', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function lhkpn_pejabat() {
    
        $profile = Profile::where('kategori_profile', '=', 'lhkpn-pejabat')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '6');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.lhkpn', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function visimisi() {
    
        $profile = Profile::where('kategori_profile', '=', 'visi-misi')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '7');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.visimisi', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function struktur_pemerintah() {
    
        $profile = Profile::where('kategori_profile', '=', 'struktur-organisasi-pemerintah')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '8');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.strukturpemerintah', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function struktur_unitkerja() {
    
        $profile = Profile::where('kategori_profile', '=', 'struktur-organisasi-unit-kerja')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '9');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.strukturunitkerja', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function tupoksi_pemerintah() {
    
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-pemerintah')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '10');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.tupoksipemerintah', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function tupoksi_unitkerja() {
    
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-unit-kerja')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '11');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.tupoksiunitkerja', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }
    
    public function agenda() {
    
        $profile = Profile::where('kategori_profile', '=', 'agenda-kerja-kegiatan-pimpinan')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '12');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profile.agenda', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function profil_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'profil-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '13');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.ppid', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));

    }

    public function visimisi_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'visi-misi-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '14');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.visimisi', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
    
    }
    
    public function struktur_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'bagan-struktur-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '15');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.struktur', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function sop_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'sop-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '16');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.sop', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function tupoksi_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'tupoksi-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '17');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.tupoksi', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function sk_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'sk-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '18');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.sk', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function perwal_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'perwal-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '19');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.perwal', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function maklumat_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'maklumat-ppid')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '20');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.maklumat', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function jampelayanan_ppid() {
    
        $profile = Profile::where('kategori_profile', '=', 'jam-pelayanan')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '21');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.jampelayanan', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function informasi_publik() {
    
        $profile = Profile::where('kategori_profile', '=', 'sk-daftar-informasi-publik')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '22');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.informasipublik', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function informasi_dikecualikan() {
    
        $profile = Profile::where('kategori_profile', '=', 'sk-daftar-informasi-dikecualikan')->first();
        $berkas = Berkas::all()
                -> where('profile_id', '=', '23');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.profileppid.informasidikecualikan', compact('profile', 'berkas', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function ppidpelaksana() {
    
        $profile = PPIDPelaksana::all();
        $title = "PPID Pelaksana Kota Madiun";
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.ppidpelaksana.index', compact('profile', 'title', 'categories', 'beritaterkini', 'tags', 'logo'));
        
    }

    public function informpublik() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Daftar Informasi Publik 2022";
        $information = Information::where('kategori_informasi', '=', 'daftar-informasi-publik')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '1');
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.publik', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function informppid() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Daftar Informasi Publik PPID Pelaksana";
        $information = Information::where('kategori_informasi', '=', 'daftar-informasi-publik-ppid-pelaksana')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '2');
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.ppid', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function informberkala() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Informasi Secara Berkala";
        $information = Information::where('kategori_informasi', '=', 'informasi-secara-berkala')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '3');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.berkala', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function informsertamerta() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Informasi Serta Merta";
        $information = Information::where('kategori_informasi', '=', 'informasi-serta-merta')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '4');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.sertamerta', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function informsetiapsaat() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Informasi Setiap Saat";
        $information = Information::where('kategori_informasi', '=', 'informasi-setiap-saat')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '5');

        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.setiapsaat', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function informdikecualikan() {
    
        $title = "Informasi";
        $title2 = "Informasi Publik";
        $subtitle = "Informasi Dikecualikan Penetapan dan Proses Uji Konsekuensi";
        $information = Information::where('kategori_informasi', '=', 'informasi-dikecualikan')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '6');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasi.dikecualikan', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function soporganisasi() {
    
        $title = "Download";
        $title2 = "SOP";
        $subtitle = "SOP Pedoman Pengelolaan Organisasi";
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-organisasi')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '7');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.sop.organisasi', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function sopadministrasi() {
    
        $title = "Download";
        $title2 = "SOP";
        $subtitle = "SOP Pedoman Pengelolaan Administrasi";
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-administrasi')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '8');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.sop.administrasi', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function sopkepegawaian() {
    
        $title = "Download";
        $title2 = "SOP";
        $subtitle = "SOP Pedoman Pengelolaan Kepegawaian";
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-kepegawaian')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '9');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.sop.kepegawaian', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }

    public function sopkeuangan() {
    
        $title = "Download";
        $title2 = "SOP";
        $subtitle = "SOP Pedoman Pengelolaan Keuangan";
        $information = Information::where('kategori_informasi', '=', 'sop-pedoman-pengelolaan-keuangan')->first();
        $berkas = BerkasInformation::all()
                -> where('informasi_id', '=', '10');
                
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.sop.keuangan', compact('information', 'berkas', 'categories', 'beritaterkini', 'tags', 'title', 'title2', 'subtitle', 'logo'));
    
    }
    public function permohonan() {
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasipublik.permohonan', compact('logo'));
     }

     public function pengajuan() {
         $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.informasipublik.pengajuan', compact('logo'));
     }
}

