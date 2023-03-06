<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/** Login Admin */

Route::get('/admin/login',[\App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/admin/login',[\App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('/admin/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

/** Halaman Utama */
route::get('/',[\App\Http\Controllers\User\BaseController::class,'index'])->name('layouts.frontend.index');
route::get('/sejarah-kota-madiun',[\App\Http\Controllers\FrontendController::class,'sejarah'])->name('layouts.frontend.sejarahkota');

/** Jadwal Rapat dan Agenda Kota */
Route::get('/jadwal-rapat', [App\Http\Controllers\User\BaseController::class, 'jadwal_rapat'])->name('jadwalrapat');
Route::get('/agenda-kota', [App\Http\Controllers\User\BaseController::class, 'daftar_agenda'])->name('daftaragenda');

/** Slug */
Route::get('/kategori/{slug}', [App\Http\Controllers\User\BaseController::class, 'contents_kategori'] )->name('contents_kategori');
Route::get('/berita/{year}/{month}/{day}/{slug}', [App\Http\Controllers\User\BaseController::class, 'contents_blog'] )->name('contents_blog');

/** Informasi Publik */
Route::resource('/permohonan-informasi', App\Http\Controllers\User\PermohonanController::class );
Route::resource('/pengajuan-keberatan', App\Http\Controllers\User\PengajuanController::class );
Route::get('/kanal-pengaduan',[\App\Http\Controllers\User\PermohonanController::class,'kanalpengaduan'])->name('kanalpengaduan.menu');


/** Dashboard Admin */
Route::group(['middleware'=>['admin','auth','PreventBackHistory']], function(){
Route::get('/dashboard-admin-ppid',[\App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.index');

/** Menu Profile Pemerintah Kota Madiun*/
Route::get('/profile/kota-madiun',[\App\Http\Controllers\ProfileController::class,'madiunprofile'])->name('madiunprofile.index');
Route::get('/profile/sejarah',[\App\Http\Controllers\ProfileController::class,'sejarah'])->name('sejarah.index');
Route::get('/profile/letak-geografis',[\App\Http\Controllers\ProfileController::class,'geografis'])->name('geografis.index');
Route::get('/profile/profil-pemerintah',[\App\Http\Controllers\ProfileController::class,'profilepemerintah'])->name('profil.pemerintah.index');
Route::get('/profile/profil-pejabat',[\App\Http\Controllers\ProfileController::class,'profilepejabat'])->name('profil.pejabat.index');
Route::get('/profile/lhkpn-pejabat',[\App\Http\Controllers\ProfileController::class,'lhkpnpejabat'])->name('lhkpn.index');
Route::get('/profile/visi-misi',[\App\Http\Controllers\ProfileController::class,'visimisi'])->name('visimisi.index');
Route::get('/profile/struktur-pemerintah',[\App\Http\Controllers\ProfileController::class,'strukturpemerintah'])->name('struktur.pemerintah.index');
Route::get('/profile/struktur-unit-kerja',[\App\Http\Controllers\ProfileController::class,'strukturunitkerja'])->name('struktur.unitkerja.index');
Route::get('/profile/tupoksi-pemerintah',[\App\Http\Controllers\ProfileController::class,'tupoksipemerintah'])->name('tupoksi.pemerintah.index');
Route::get('/profile/tupoksi-unit-kerja',[\App\Http\Controllers\ProfileController::class,'tupoksiunitkerja'])->name('tupoksi.unitkerja.index');
Route::get('/profile/agenda-kerja-kegiatan-pimpinan',[\App\Http\Controllers\ProfileController::class,'agenda'])->name('agenda.index');
Route::post('/profil/store', [App\Http\Controllers\ProfileController::class, 'store'])->name('profil.create');
Route::get('/profile/transparansi-anggaran-kota-madiun',[\App\Http\Controllers\ProfileController::class,'transparansianggaran'])->name('transparansi.index');

/** Menu Profile PPID*/
Route::get('/profile/ppid',[\App\Http\Controllers\ProfilePPIDController::class,'profileppid'])->name('profile.ppid.index');
Route::get('/profile/visi-misi-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'visimisippid'])->name('visimisi.ppid.index');
Route::get('/profile/bagan-struktur-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'baganstruktur'])->name('bagan.struktur.index');
Route::get('/profile/sop-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'sop'])->name('sop.index');
Route::get('/profile/tupoksi-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'tupoksippid'])->name('tupoksi.ppid.index');
Route::get('/profile/sk-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'skppid'])->name('sk.ppid.index');
Route::get('/profile/perwal-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'perwalppid'])->name('perwal.ppid.index');
Route::get('/profile/maklumat-ppid',[\App\Http\Controllers\ProfilePPIDController::class,'maklumatppid'])->name('maklumat.ppid.index');
Route::get('/profile/jam-pelayanan',[\App\Http\Controllers\ProfilePPIDController::class,'jampelayanan'])->name('jam.pelayanan.index');
Route::get('/profile/sk-daftar-informasi-publik',[\App\Http\Controllers\ProfilePPIDController::class,'skpublik'])->name('sk.publik.index');
Route::get('/profile/sk-daftar-informasi-dikecualikan',[\App\Http\Controllers\ProfilePPIDController::class,'skdikecualikan'])->name('sk.dikecualikan.index');
Route::post('/profil-ppid/store', [App\Http\Controllers\ProfilePPIDController::class, 'store'])->name('profilppid.create');

/** Data Permohonan */
Route::get('/permohonan', '\App\Http\Controllers\InformasiPublikController@indexpermohonan')->name('admin.informasipublik.indexpermohonan');
Route::delete('/hapus-permohonan/{permohonan}', '\App\Http\Controllers\InformasiPublikController@destroypermohonan')->name('destroy_permohonan');

/** Data Pengajuan */
Route::get('/pengajuan', '\App\Http\Controllers\InformasiPublikController@indexpengajuan')->name('admin.informasipublik.indexpengajuan');
Route::delete('/hapus-pengajuan/{pengajuan}', '\App\Http\Controllers\InformasiPublikController@destroypengajuan')->name('destroy_pengajuan');


/** CRUD Data PPID Pelaksana Kota Madiun*/
Route::resource('/ppidpelaksana', App\Http\Controllers\PPIDPelaksanaController::class );


/** Daftar Informasi Publik dan SOP*/
Route::get('/informasi/daftar-informasi-publik-2022',[\App\Http\Controllers\InformationController::class,'informasipublik'])->name('informasi.publik.index');
Route::get('/informasi/daftar-informasi-publik-ppid-pelaksana',[\App\Http\Controllers\InformationController::class,'informasippid'])->name('informasi.ppid.index');
Route::get('/informasi/informasi-secara-berkala',[\App\Http\Controllers\InformationController::class,'informasiberkala'])->name('informasi.berkala.index');
Route::get('/informasi/informasi-serta-merta',[\App\Http\Controllers\InformationController::class,'informasisertamerta'])->name('informasi.serta.merta.index');
Route::get('/informasi/informasi-setiap-saat',[\App\Http\Controllers\InformationController::class,'informasisetiapsaat'])->name('informasi.setiap.saat.index');
Route::get('/informasi/informasi-dikecualikan-penetapan-dan-proses-uji-konsekuensi',[\App\Http\Controllers\InformationController::class,'informasidikecualikan'])->name('informasi.dikecualikan.index');
Route::get('/informasi/sop-pedoman-pengelolaan-organisasi',[\App\Http\Controllers\InformationController::class,'soporganisasi'])->name('sop.organisasi.index');
Route::get('/informasi/sop-pedoman-pengelolaan-administrasi',[\App\Http\Controllers\InformationController::class,'sopadministrasi'])->name('sop.administrasi.index');
Route::get('/informasi/sop-pedoman-pengelolaan-kepegawaian',[\App\Http\Controllers\InformationController::class,'sopkepegawaian'])->name('sop.kepegawaian.index');
Route::get('/informasi/sop-pedoman-pengelolaan-keuangan',[\App\Http\Controllers\InformationController::class,'sopkeuangan'])->name('sop.keuangan.index');
Route::post('/informasi/store', [App\Http\Controllers\InformationController::class, 'store'])->name('information.create');

Route::post('/validasipermohonan/store', [App\Http\Controllers\User\PermohonanController::class, 'validasi_store'])->name('permohonan.storevalidasi');

/** Data Kategori*/
Route::resource('/categories', App\Http\Controllers\KategoriController::class );

/** Data Tag*/
Route::prefix('a')->name('admin.')->group(function () {
    Route::resource('/tags', App\Http\Controllers\TagController::class );
    Route::resource('/post', App\Http\Controllers\PostController::class );
    Route::resource('/icons', App\Http\Controllers\IconController::class );
    Route::resource('/youtube', App\Http\Controllers\YoutubeController::class );
    Route::get('/pengumuman', [\App\Http\Controllers\PostController::class, 'indexpengumuman'])->name('pengumuman.index');
    Route::get('/produk-hukum', [\App\Http\Controllers\PostController::class, 'indexproduk'])->name('pengumuman.index');
    Route::get('/materi-ppid-kota',  [\App\Http\Controllers\PostController::class, 'materippid'])->name('ppidmateri.index');
    Route::get('/materi-umum', [\App\Http\Controllers\PostController::class, 'materiumum'])->name('materiumum.index');
    Route::get('/laporan-pengaduan', [\App\Http\Controllers\PostController::class, 'pengaduan'])->name('pengaduan.index');
    Route::get('/kanalpengaduan', [\App\Http\Controllers\InformasiPublikController::class, 'kanalpengaduan'])->name('kanalpengaduan.index');
    Route::post('/kanalpengaduan/update', [\App\Http\Controllers\InformasiPublikController::class, 'kanalpengaduan_update'])->name('kanalpengaduan.update');
    Route::get('/berita-ppid', [\App\Http\Controllers\PostController::class, 'berita'])->name('berita.index');
    Route::get('/artikel', [\App\Http\Controllers\PostController::class, 'artikel'])->name('artikel.index');
    Route::get('/narasi-tunggal', [\App\Http\Controllers\PostController::class, 'narasi'])->name('narasi.index');
    Route::get('/galeri', [\App\Http\Controllers\PostController::class, 'galeri'])->name('galeri.index');
    Route::get('/infografis', [\App\Http\Controllers\PostController::class, 'infografis'])->name('infografis.index');
    Route::get('document/destroy/{document}', [App\Http\Controllers\PostController::class, 'destroy_document'] )->name('destroy_document');
    Route::get('berkasprofile/destroy/{berkasprofile}', [App\Http\Controllers\ProfileController::class, 'destroy_berkas'] )->name('destroy_berkasprofile');
    Route::get('berkasppid/destroy/{berkasppid}', [App\Http\Controllers\ProfilePPIDController::class, 'destroy_berkasppid'] )->name('destroy_berkasppid');
    Route::get('berkas/destroy/{berkas}', [App\Http\Controllers\InformationController::class, 'destroy_berkas_informasi'] )->name('destroy_berkas_informasi');

    });
});

/** Data File */

Route::middleware('verified')->group(function () {
    Route::get('/file/{file}', [App\Http\Controllers\FileController::class, 'show'])->name('file.show');

});

/** Menu Profile Pemerintah Kota Madiun */
Route::get('/sejarah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'sejarah_madiun'])->name('menu.sejarah.madiun');
Route::get('/letak-geografis-kota-madiun',[\App\Http\Controllers\User\MainController::class,'geografis_madiun'])->name('menu.geografis.madiun');
Route::get('/profile-pemerintah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'profil_pemerintah'])->name('menu.profilepemerintah.madiun');
Route::get('/profile-kota-madiun',[\App\Http\Controllers\User\MainController::class,'profil_kota_madiun'])->name('menu.profilkota.madiun');
Route::get('/profile-pejabat-kota-madiun',[\App\Http\Controllers\User\MainController::class,'profil_pejabat'])->name('menu.profilepejabat.madiun');
Route::get('/lhkpn-pejabat-publik-pemerintah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'lhkpn_pejabat'])->name('menu.lhkpn.madiun');
Route::get('/visi-misi-kota-madiun',[\App\Http\Controllers\User\MainController::class,'visimisi'])->name('menu.visimisi.madiun');
Route::get('/bagan-struktur-organisasi-pemerintah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'struktur_pemerintah'])->name('menu.strukturpemerintah.madiun');
Route::get('/struktur-organisasi-unit-kerja',[\App\Http\Controllers\User\MainController::class,'struktur_unitkerja'])->name('menu.strukturunitkerja.madiun');
Route::get('/tupoksi-pemerintah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'tupoksi_pemerintah'])->name('menu.tupoksipemerintah.madiun');
Route::get('/tupoksi-unit-kerja-kota-madiun',[\App\Http\Controllers\User\MainController::class,'tupoksi_unitkerja'])->name('menu.tupoksiunitkerja.madiun');
Route::get('/agenda-kerja-dan-kegiatan-pimpinan-pemerintah-kota-madiun',[\App\Http\Controllers\User\MainController::class,'agenda'])->name('menu.agenda.madiun');
Route::get('/transparansi-anggaran-kota-madiun',[\App\Http\Controllers\User\MainController::class,'transparansianggaran'])->name('menu.transparansianggaran.madiun');


/** Menu Profile PPID */
Route::get('/profil-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'profil_ppid'])->name('menu.profil.ppid');
Route::get('/visi-misi-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'visimisi_ppid'])->name('menu.visimisi.ppid');
Route::get('/struktur-organisasi-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'struktur_ppid'])->name('menu.struktur.ppid');
Route::get('/sop-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'sop_ppid'])->name('menu.sop.ppid');
Route::get('/tupoksi-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'tupoksi_ppid'])->name('menu.tupoksi.ppid');
Route::get('/sk-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'sk_ppid'])->name('menu.sk.ppid');
Route::get('/perwal-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'perwal_ppid'])->name('menu.perwal.ppid');
Route::get('/maklumat-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'maklumat_ppid'])->name('menu.maklumat.ppid');
Route::get('/jampelayanan-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'jampelayanan_ppid'])->name('menu.jampelayanan.ppid');
Route::get('/informasi-publik-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'informasi_publik'])->name('menu.informasipublik.ppid');
Route::get('/informasi-dikecualikan-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'informasi_dikecualikan'])->name('menu.informasidikecualikan.ppid');

/** Menu Informasi Publik */
/** Menu Profile Pemerintah Kota Madiun */
Route::get('/daftar-informasi-publik-ppid-kota-madiun',[\App\Http\Controllers\User\MainController::class,'informpublik'])->name('informasi.publik');
Route::get('/daftar-informasi-publik-ppid-pelaksana',[\App\Http\Controllers\User\MainController::class,'informppid'])->name('informasi.ppid');
Route::get('/informasi-secara-berkala',[\App\Http\Controllers\User\MainController::class,'informberkala'])->name('informasi.berkala');
Route::get('/informasi-serta-merta',[\App\Http\Controllers\User\MainController::class,'informsertamerta'])->name('informasi.sertamerta');
Route::get('/informasi-setiap-saat',[\App\Http\Controllers\User\MainController::class,'informsetiapsaat'])->name('informasi.setiapsaat');
Route::get('/informasi-dikecualikan',[\App\Http\Controllers\User\MainController::class,'informdikecualikan'])->name('informasi.dikecualikan');

/** Menu SOP */
Route::get('/sop-pedoman-pengelolaan-organisasi',[\App\Http\Controllers\User\MainController::class,'soporganisasi'])->name('sop.organisasi');
Route::get('/sop-pedoman-pengelolaan-administrasi',[\App\Http\Controllers\User\MainController::class,'sopadministrasi'])->name('sop.administrasi');
Route::get('/sop-pedoman-kepegawaian',[\App\Http\Controllers\User\MainController::class,'sopkepegawaian'])->name('sop.kepegawaian');
Route::get('/sop-pedoman-pengelolaan-keuangan',[\App\Http\Controllers\User\MainController::class,'sopkeuangan'])->name('sop.keuangan');

/** Menu PPID Pelaksana */
Route::get('/ppid-pelaksana-kota-madiun',[\App\Http\Controllers\User\MainController::class,'ppidpelaksana'])->name('menu.ppid.pelaksana');
// Auth::routes();

/** File Show */
Route::get('/menu/file/{file}', [App\Http\Controllers\User\FileController::class, 'show'])->name('menu.file');

/** Search Engine */
Route::post('/news/cariberita',[\App\Http\Controllers\User\BaseController::class, 'cari'])->name('reader.search.berita');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');