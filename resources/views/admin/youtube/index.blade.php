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

  <link rel="stylesheet" href="{{ asset('backend2/assets/select2/dist/css/select2.min.css') }}">
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
              <div class="breadcrumb-item"><a href="#">Youtube</a></div>
              <div class="breadcrumb-item">{{$judul}}</div>
            </div>
          </div>

    <div class="content-body">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-14">
            <div class="card" style="padding-left:20px; padding-right:20px; padding-top:20px;">
                <div class="card-body">
                <h4 class="card-title">{{$judul}}</h4>
                <br>
                      <div class="card-tools">
                            <br>
                            <a href="{{ route('admin.youtube.create') }}" class="btn btn-primary btn-round">Tambah Data <i class="fa fa-plus"></i></a>
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
                                                <th>No</th>
                                                <th style="width:220px; text-align:center;">Judul</th>
                                                <th style="width:220px; text-align:center;">Content</th>
                                                <th style="text-align:center;">Link</th>
                                                <th style="text-align:center;">Status Publish</th>
                                                <th style="width:200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @php $i=1 @endphp
                                            @foreach ($youtube as $data)
                                                <td>{{$i++}}</td>
                                                <td>{{$data->judul}}</td>
                                                <td>{!! $data->content !!}</td>
                                                <td>{{$data->link}}</td>
                                                <td>
                                                    @if ($data->ispublish == '1')
                                                        <div class="badge badge-success" style="margin-top:5px;">Publish</div>
                                                    @else
                                                        <div class="badge badge-danger" style="margin-top:5px;">Draf</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.youtube.destroy',$data->id) }}"  method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('admin.youtube.edit',$data->id) }}" class="btn btn-warning " data-id="{{ $data->id }}"><i class="fa fa-edit"></i> Ubah</a>&ensp;
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Konfirmasi hapus data youtube ?')" ><i class="fas fa-trash"></i> Hapus</button>
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
