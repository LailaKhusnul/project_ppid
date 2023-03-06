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
                <h1 class="banner-title">Agenda Kota</h1>
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

        <table  id="jadwal_rapat" class="table table-striped table-bordered table-paginate" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align: center;width:5%; ">No</th>
                    <th style="text-align: center;max-width:5%">Nama Agenda</th>
                    <th style="text-align: center;" >Lokasi</th>
                    <th style="text-align: center;">Waktu</th>
                    <th style="text-align: center;">Leading Sektor</th>
                </tr>
            </thead>
            <tbody style="word-break: break-word;vertical-align: top;">
                <?php  $no=1; ?>
                @for ($i = 0; $i < $jumlah; $i++)

                <tr>
                    <td  style="text-align: center;width:5%; ">{{ $no; }}</td>
                    <td  style="white-space: nowrap;width:20%;word-break: break-word;vertical-align: top; ">
                       <p style="word-wrap: break-word"> <strong style="color:rgb(204, 95, 76)"><?php echo wordwrap($data_agenda["data"]["$i"]["nama_agenda"], 40, "<br/>")  ?> </strong></p>
                      

                        @if ($data_agenda["data"]["$i"]["status_agenda"] == "Sedang Berlangsung")
                        <p >  <span style="color:red;"> Status : {{ $data_agenda["data"]["$i"]["status_agenda"]  }} </span></p>
                        @endif
                           @if($data_agenda["data"]["$i"]["status_agenda"]  == "Belum Berlangsung")
                           <p>  Status : <span style="color:blue;"> {{ $data_agenda["data"]["$i"]["status_agenda"]  }} </span></p>
                           @endif
                           @if($data_agenda["data"]["$i"]["status_agenda"]  == "Selesai")
                           <p >  Status :   <span style="color:green;"> {{ $data_agenda["data"]["$i"]["status_agenda"] }} </span></p>
                           @endif
                    </td>
                    <td style="text-align: center;">{{ $data_agenda["data"]["$i"]["lokasi"] }}</td>
                    <td style="width:20%; text-align: center;">
                        <p> <strong style="color:rgb(204, 95, 76)">{{ date('d M Y', strtotime( $data_agenda["data"]["$i"]["tanggal"])) }} </strong></p>
                        <p>{{ date('H:i', strtotime( $data_agenda["data"]["$i"]["jam_mulai"] )) }} - {{ date('H:i', strtotime($data_agenda["data"]["$i"]["jam_selesai"] ))}}</p> 
                    </td>

                    <td style="width:25%; text-align: center;">{{ $data_agenda["data"]["$i"]["nama_skpd"] }}</td>
                  
                </tr>
                <?php $no++; ?>
                @endfor
            </tfoot>
        </table> <br>

        </div>
    </section><!-- End Blog Section -->


</main><!-- End #main -->

@endsection

