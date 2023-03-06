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
                <h2 style="font-weight: 200;">Informasi</h2>
            </div>

        </div>
    </div>

<section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

        <h5>Terima Kasih Telah Menggunakan Layanan Kami</h5>
        @foreach($pemohon as $data)
        <p>Data pengaduan atas nama {{$data->nama_lengkap}} dengan keluhan : {!!$data->rincian_informasi!!} Berhasil terkirim.
           Mohon untuk menyimpan kode pengaduan ini <b>{{$data->kode_permohonan}}</b> untuk memantau proses pengaduan
           ke admin PPID.
        </div>
        @endforeach
    </section><!-- End Blog Section -->


</main><!-- End #main -->

@include('layouts.frontend.footer')
<!-- Footer end -->

@endsection

