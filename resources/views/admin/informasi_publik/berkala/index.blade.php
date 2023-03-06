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
              <div class="breadcrumb-item"><a href="#">Informasi Publik</a></div>
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
                      <div class="card-tools">
                            <br>
                            <a href="{{ route('informasi_publik.berkala.create') }}" class="btn btn-primary btn-round">Tambah Data <i class="fa fa-plus"></i></a>
                      </div>
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
                                                <th>No.</th>
                                                <th>Judul</th>
                                                <th>Isi</th>
                                                <th width="220px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @foreach ($informasi_berkala as $b)
                                                <td>{{$b->id}}</td>
                                                <td>{{$b->judul}}</td>
                                                <td>{!!$b->isi!!}</td>
                                                <td>
                                                    <form action="{{ route('informasi_publik.berkala.destroy',$b->id) }}"  method="POST">
                                                        <a href="{{ route('informasi_publik.berkala.edit',$b->id) }}" class="btn btn-warning "><i class="fa fa-edit"></i> Ubah</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Konfirmasi hapus Daftar Informasi Secara Berkala?')" ><i class="fas fa-trash"></i> Hapus</button>
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
@endsection
