@extends('layouts.frontend.appnew')

@push('styles')
<style>
    .pagination {
      display: inline-block;
    }
    
    .pagination li {
      float: left;
      text-decoration: none;
      position:relative;
      float:left;
      padding:6px 12px;
      margin-left:-1px;
      line-height:1.42857143;
      color:#337ab7;
      background-color:#fff;
      border:1px solid #ddd
    }
    
    .pagination li.active {
      background-color: #564d9c;
      color: white;
    }
    
    .pagination li:hover:not(.active) {
      background-color: #ddd;
      border-radius: 5px;
    }
    </style>
@endpush


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
                <h1 class="banner-title">Jadwal Rapat</h1>
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
                <h2 style="font-weight: 200;">{{$title}}</h2>
            </div>

        </div>
    </div>

<section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <table id="jadwal_rapat" class="table table-striped table-bordered table-paginate">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Judul Rapat</th>
                        <th style="text-align: center;">Nama OPD</th>
                        <th style="text-align: center;">Lokasi</th>
                        <th style="text-align: center;">Waktu</th>
                        <th style="text-align: center;">Jumlah Peserta</th>

                    </tr>
                </thead>
                <tbody>
                    <?php  $no=1; ?>
                    @for ($i = 0; $i < $jumlah; $i++) <tr>
                        <td style="text-align: center;">{{ $no; }}</td>
                        <td>{{ $data_rapat["data"]["$i"]["judul_rapat"] }}</td>
                        <td>{{ $data_rapat["data"]["$i"]["nama_opd"] }}</td>
                        <td style="width:10%; text-align: center;">{{ $data_rapat["data"]["$i"]["lokasi_rapat"] }}</td>
                        <td style="white-space: nowrap; width:20%; text-align: center;">
                            <p>{{  date('d/m/Y H:i', strtotime($data_rapat["data"]["$i"]["mulai"] )) }} </p>
                            <p> {{  date('d/m/Y H:i', strtotime($data_rapat["data"]["$i"]["selesai"] )) }}</p>
                        </td>
                        <td style="width:8%; text-align: center;">{{ $data_rapat["data"]["$i"]["jumlah_peserta"] }}</td>

                        </tr>
                        <?php $no++; ?>
                        @endfor
                        </tfoot>
            </table> <br>

        </div>
    </section><!-- End Blog Section -->


</main><!-- End #main -->

@endsection

