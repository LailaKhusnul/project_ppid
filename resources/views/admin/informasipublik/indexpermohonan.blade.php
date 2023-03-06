<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard | PPID Kota Madiun</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend2/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
  <link href="{{asset('vendorss/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{  asset ('backend2/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend2/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>

@extends('admin.appnew')

@section('content')

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">							   
    <div class="modal-content">         						      
     <div class="modal-body">
								      	 
       <button type="button" class="close" data-dismiss="modal"><span 
       aria-hidden="true">&times;</span><span class="sr- 
       only"></span></button>						        
      <img src="" class="imagepreview" style="width: 100%;">
								      
     </div>							    
   </div>								   
  </div>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg">

        @include('admin.navbar')

        @include('admin.sidebar')

              <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Permohonan</a></div>
              <div class="breadcrumb-item">{{$judul}}</div>
            </div>
          </div>

    <div class="content-body">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card" style="padding-left:20px; padding-right:20px; padding-top:20px;">
                <div class="card-body">
                <h4 class="card-title">{{$judul}}</h4>
                <br>
                      
                                 @if(Session::has('success'))
                                 <br></br>
                                    <div class="btn btn-success text-white" style="width:100%; height:40px">
                                        <p>{{Session::get('success')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('delete'))
                                <br></br>
                                    <div class="btn btn-warning text-white" style="width:100%; height:40px">
                                        <p>{{Session::get('delete')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('update'))
                                <br></br>
                                    <div class="btn btn-info text-white" style="width:100%; height:40px">
                                        <p>{{Session::get('update')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('failed'))
                                <br></br>
                                    <div class="btn btn-danger text-white" style="width:100%; height:40px">
                                        <p>{{Session::get('delete')}}</p>
                                    </div>
                                @endif

                                <br></br>

                                <div class="table-responsive">
                                    <table class="display table table-striped table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pendaftar</th>
                                                <th>Kategori Permohonan</th>
                                                <th>NIK / No. Identitas</th>
                                                <th>Nama Lembaga / Organisasi</th>
                                                <th>KTP</th>
                                                <th>Akta Notaris</th>
                                                <th>Email</th>
                                                <th>Nomor WhatsApp</th>
                                                <th>Pekerjaan</th>
                                                <th>Alamat</th>
                                                <th>Rincian Informasi</th>
                                                <th>Tujuan Penggunaan Informasi</th>
                                                <th>Cara Memperoleh Informasi</th>
                                                <th>Mendapatkan Salinan Informasi</th>
                                                <th>Cara Mendapatkan Salinan Informasi</th>
                                                <th>Status Permohonan</th>
                                                <th width="220px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @php $i=1 @endphp
                                            @foreach ($permohonan as $data)
                                                <td>{{$i++}}</td>
                                                <td>{{$data->kode_permohonan}}</td>
                                                <td>{{$data->kategori_permohonan}}</td>
                                                <td>{{$data->nik_nip}}</td>
                                                <td>{{$data->nama_lengkap}}
                                                <td>
                                                    @if ($data->ktp == null)
                                                        -
                                                    @else
                                                    <a href="#" class="pop">		
                                                        <img src="{{ route('file.show', encrypt($data->ktp)) }}" class="img-fluid" style="width: 100px"> 
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->akta == null)
                                                        -
                                                    @else
                                                    <a href="#" class="pop">		
                                                        <img src="{{ route('file.show', encrypt($data->akta)) }}" class="img-fluid" style="width: 100px"> 
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->telepon}}</td>
                                                <td>{{$data->pekerjaan}}</td>
                                                <td>{!!$data->alamat!!}</td>
                                                <td>{!!$data->rincian_informasi!!}</td>
                                                <td>{!!$data->tujuan!!}</td>
                                                <td>{!!$data->get_information!!}</td>
                                                <td>{!!$data->copy_information!!}</td>
                                                <td>{!!$data->how_copy!!}</td>
                                                <td>@if($data->status_form == '1') <strong><p style="color:orange;  font-weight: bold;"> Menunggu Tindak Lanjut</p></strong>
                                                     @elseif($data->status_form == "2")  <strong><p style="color:purple;  font-weight: bold;">Proses Tindak Lanjut</p></strong>
                                                    @elseif($data->status_form == "3") <strong><p style="color:green;  font-weight: bold;"> Selesai Tindak Lanjut</p></strong>
                                                    @elseif($data->status_form == "4")<strong><p style="color:red;  font-weight: bold;"> Tidak bisa Ditindaklanjuti</p></strong>
                                                @else -
                                                @endif</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning validasi" data-toggle="modal" data-catatan="{{ $data->catatan_validasi }}" data-status="{{ $data->status_form }}" data-id="{{ $data->id }}" data-nama="{{ $data->nama_lengkap }}" data-target="#validasimodal"><i class="fas fa-check"></i> Validasi</button><br><br>
                                            
                                                    <form action="{{ route('destroy_permohonan',$data->id) }}"  method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Konfirmasi hapus data permohonan user ?')" ><i class="fas fa-trash"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                                   
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
             </div>
        </div>
</div>
<!-- #/ container -->
</div>

        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

        @include('admin.informasipublik.validasiform')

     
        <script>
       

            $('.validasi').on('click', function() {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var nama = $(this).data('nama');
                var catatan = $(this).data('catatan');
                $('#nama').val(nama);
                $('#idvalidasi').val(id);
                document.getElementById("catatanvalidasi").value = catatan;
                document.getElementById("statusform").value = status;
                $('.validasimodal').modal('toggle');
            })

        </script>
@endsection



