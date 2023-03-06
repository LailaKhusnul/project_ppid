@extends('layouts.frontend.appnew')

@section('content')


  <div class="body-inner">

    @include('layouts.frontend.topbar')
    <!--/ Topbar end -->
<!-- Header start -->
@include('layouts.frontend.header')
<!--/ Header end -->

<div id="banner-area" class="banner-area" style="background-image:url({{asset('frontend/images/news/berita2.jpg')}})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Form Informasi Publik</h1>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<div class="breadcrumbs" style="background-color: #EEF9FF; height: 90px;">
        <div class="container" >
            <br>

            <div class="d-flex justify-content-between align-items-center">
                <h2 style="font-weight: 200;">Permohonan Informasi Publik</h2>
            </div>

        </div>
    </div>

<br></br>
<div class="tabsMenu"  style="margin-left: 50px">
    <input type="radio" class="hidden" id="multitabs1" name="mtabs" checked>
    <input type="radio" class="hidden" id="multitabs2" name="mtabs">
    <input type="radio" class="hidden" id="multitabs3" name="mtabs">
    <div class="tabsHead">
        <label for="multitabs1" class="tabs" id="tab1">Permohonan Perorangan</label>
        <label for="multitabs2" class="tabs" id="tab2">Permohonan Lembaga / Organisasi</label>
    </div>
    <div class="tabsContent">
        <div class="tabsContent1">
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

        <form id="contact-form" class="form-valide" action="{{route('permohonan-informasi.store')}}" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
          <div class="error-container"></div>
          <b>Identitas Pemohon*</b><br></br>
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <lable><b>Kategori Permohonan</b></label>
            <select class="form-control" name="kategori_permohonan" required>
                    <option value="">Pilih</option>
                    <option value="Perorangan">Perorangan</option>
                    <option value="Lembaga_Organisasi">Lembaga / Organisasi</option>
                </select>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>NIK/ No. Identitas Pribadi</b></label>
                <input class="form-control form-control-subject" name="nik_nip" id="nik_nip" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Nama Lengkap</b></label>
                <input class="form-control form-control-subject" name="nama_lengkap" id="nama_lengkap" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Upload KTP Pribadi</b></label>
                <input type="file" class="form-control form-control-subject" name="ktp" id="ktp" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Email</b></label>
                <input class="form-control form-control-subject" name="email" id="email" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Nomor WhatsApp</b></label>
                <input class="form-control form-control-subject" name="telepon" id="telepon" placeholder="" required>
                <span style="color: #ff0000; font-size: 12px">*wajib diisi dan harus WA aktif</span>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Pekerjaan</b></label>
                <input class="form-control form-control-subject" name="pekerjaan" id="pekerjaan" placeholder="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
          <lable><b>Alamat</b></label>
            <textarea class="ckeditor form-control" name="alamat" id="alamat" placeholder="" rows="10"
              required></textarea>
          </div>
       <br>
          <b>Data Permohonan*</b><br></br>
          <div class="form-group">
          <lable><b>Rincian Informasi</b></label>
            <textarea class="ckeditor form-control" name="rincian_informasi" id="rincian_informasi" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="form-group">
          <lable><b>Tujuan Penggunaan Informasi</b></label>
            <textarea class="ckeditor form-control" name="tujuan" id="tujuan" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="form-group">
            <label><b>Cara Memperoleh Informasi</b></label><br>
              <input type="radio" id="melihat" name="get_information" value="Melihat" style="margin-left: 12px;">
              <label for="melihat">Melihat</label><br>
              <input type="radio" id="membaca" name="get_information" value="Membaca" style="margin-left: 5px;">
              <label for="membaca">Membaca</label><br>
              <input type="radio" id="mendengarkan" name="get_information" value="Mendengarkan"  style="margin-left: 5px;">
              <label for="mendengarkan">Mendengarkan</label><br>
              <input type="radio" id="mencatat" name="get_information" value="mencatat" style="margin-left: 12px;">
              <label for="mencatat">Mencatat</label>
          </div>
          <div class="form-group">
           <label> <b>Mendapatkan Salinan Informasi</b></label><br>
              <input type="radio" id="softcopy" name="copy_information" value="Soft Copy" style="margin-left: 12px;">
              <label for="softcopy">Soft Copy</label><br>
              <input type="radio" id="hardcopy" name="copy_information" value="Hard Copy" style="margin-left: 5px;">
              <label for="hardcopy" style="margin-left: 5px;">Hard Copy</label>
          </div>
          <div class="form-group">
            <label><b>Cara Mendapatkan Salinan Informasi</b></label><br>
              <input type="radio" id="mengambil_langsung" name="how_copy" value="Mengambil Langsung" style="margin-left: 12px;">
              <label for="mengambil_langsung">Mengambil Langsung</label><br>
              <input type="radio" id="faksimili" name="how_copy" value="Faksimili" style="margin-left: 5px;">
              <label for="faksimili" style="margin-left: 5px;">Faksimili</label><br>
              <input type="radio" id="email" name="how_copy" value="Email" style="margin-left: 12px;">
              <label for="email" style="margin-left: 5px;">Email</label>
          </div>
          <div class="text-left"><br>
            <button class="btn btn-primary solid blank" type="submit">Submit</button>
          </div>
        </form>
        </div>
    </section><!-- End Blog Section -->
        </div>
        <div class="tabsContent2">
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

        <form id="contact-form" class="form-valide" action="{{route('permohonan-informasi.store')}}" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
          <div class="error-container"></div>
          <b>Identitas Pemohon*</b><br></br>
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <lable><b>Kategori Permohonan</b></label>
                <select class="form-control" name="kategori_permohonan" required>
                    <option value="">Pilih</option>
                    <option value="Perorangan">Perorangan</option>
                    <option value="Lembaga_Organisasi">Lembaga / Organisasi</option>
                </select>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>NIK/ No. Identitas Pimpinan</b></label>
                <input class="form-control form-control-subject" name="nik_nip" id="nik_nip" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Nama Lembaga / Organisasi</b></label>
                <input class="form-control form-control-subject" name="nama_lengkap" id="nama_lengkap" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Upload KTP Pimpinan</b></label>
                <input type="file" class="form-control form-control-subject" name="ktp" id="ktp" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Upload Akta Notaris Lembaga / Organisasi</b></label>
                <input type="file" class="form-control form-control-subject" name="akta" id="akta" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Email</b></label>
                <input class="form-control form-control-subject" name="email" id="email" placeholder="" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Nomor WhatsApp</b></label>
                <input class="form-control form-control-subject" name="telepon" id="telepon" placeholder="" required>
                <span style="color: #ff0000; font-size: 12px">*wajib diisi dan harus WA aktif</span>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <lable><b>Pekerjaan</b></label>
                <input class="form-control form-control-subject" name="pekerjaan" id="pekerjaan" placeholder="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
          <lable><b>Alamat</b></label>
            <textarea class="ckeditor form-control" name="alamat" id="alamat" placeholder="" rows="10"
              required></textarea>
          </div>
       <br>
          <b>Data Permohonan*</b><br></br>
          <div class="form-group">
          <lable><b>Rincian Informasi</b></label>
            <textarea class="ckeditor form-control" name="rincian_informasi" id="rincian_informasi" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="form-group">
          <lable><b>Tujuan Penggunaan Informasi</b></label>
            <textarea class="ckeditor form-control" name="tujuan" id="tujuan" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="form-group">
            <label><b>Cara Memperoleh Informasi</b></label><br>
              <input type="radio" id="melihat" name="get_information" value="Melihat" style="margin-left: 12px;">
              <label for="melihat">Melihat</label><br>
              <input type="radio" id="membaca" name="get_information" value="Membaca" style="margin-left: 5px;">
              <label for="membaca">Membaca</label><br>
              <input type="radio" id="mendengarkan" name="get_information" value="Mendengarkan"  style="margin-left: 5px;">
              <label for="mendengarkan">Mendengarkan</label><br>
              <input type="radio" id="mencatat" name="get_information" value="mencatat" style="margin-left: 12px;">
              <label for="mencatat">Mencatat</label>
          </div>
          <div class="form-group">
           <label> <b>Mendapatkan Salinan Informasi</b></label><br>
              <input type="radio" id="softcopy" name="copy_information" value="Soft Copy" style="margin-left: 12px;">
              <label for="softcopy">Soft Copy</label><br>
              <input type="radio" id="hardcopy" name="copy_information" value="Hard Copy" style="margin-left: 5px;">
              <label for="hardcopy" style="margin-left: 5px;">Hard Copy</label>
          </div>
          <div class="form-group">
            <label><b>Cara Mendapatkan Salinan Informasi</b></label><br>
              <input type="radio" id="mengambil_langsung" name="how_copy" value="Mengambil Langsung" style="margin-left: 12px;">
              <label for="mengambil_langsung">Mengambil Langsung</label><br>
              <input type="radio" id="faksimili" name="how_copy" value="Faksimili" style="margin-left: 5px;">
              <label for="faksimili" style="margin-left: 5px;">Faksimili</label><br>
              <input type="radio" id="email" name="how_copy" value="Email" style="margin-left: 12px;">
              <label for="email" style="margin-left: 5px;">Email</label>
          </div>
          <div class="text-left"><br>
            <button class="btn btn-primary solid blank" type="submit">Submit</button>
          </div>
        </form>
        </div>
    </section><!-- End Blog Section -->
        </div>
    </div>
</div>
</main><!-- End #main -->

@include('layouts.frontend.footer')
<!-- Footer end -->

@endsection

