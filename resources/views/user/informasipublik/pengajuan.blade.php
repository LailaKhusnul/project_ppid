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
                <h2 style="font-weight: 200;">Pengajuan Keberatan Informasi</h2>
            </div>

        </div>
    </div>

<section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

        @if(Session::has('success'))
            <div class="btn btn-success" style="width:100%; height:50px">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif

        @if(Session::has('delete'))
            <div class="btn btn-warning" style="width:100%; height:50px">
                <p>{{Session::get('delete')}}</p>
            </div>
        @endif

        @if(Session::has('update'))
            <div class="btn btn-info" style="width:100%; height:50px">
                <p>{{Session::get('update')}}</p>
            </div>
        @endif

        @if(Session::has('failed'))
            <div class="btn btn-danger" style="width:100%; height:50px">
                <p>{{Session::get('delete')}}</p>
            </div>
        @endif
        <br></br>
        
        <form id="contact-form" class="form-valide" action="{{route('pengajuan-keberatan.store')}}" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
          <div class="error-container"></div>
          <b>Pengajuan Keberatan*</b><br></br>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Kode Permohonan</label>
                <input class="form-control form-control-name" name="kode_permohonan" id="kode_permohonan" placeholder="Kode Permohonan" type="integer" required>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>NIK / No. Identitas Pribadi</label>
                <input class="form-control form-control-email" name="nik_nip" id="nik_nip" placeholder="NIK" type="integer"
                  required>
              </div>
            </div>
          </div>
          <div class="text-left"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
          </div>
        </form>

        </div>
    </section><!-- End Blog Section -->


</main><!-- End #main -->

@include('layouts.frontend.footer')
<!-- Footer end -->

@endsection

