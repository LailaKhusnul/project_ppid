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
              <div class="breadcrumb-item"><a href="#">Youtube</a></div>
              <div class="breadcrumb-item">{{$judul}}</div>
            </div>
          </div>

<div class="content-body">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card" style="padding-left:20px; padding-right:20px; padding-top:20px;">
                <div class="card-body">
                <h4 class="card-title">{{$judul}}</h4>
                <br>

                    @if(Session::has('success'))
                        <div class="btn btn-success text-white" style="width:100%; height:40px">
                            <p>{{Session::get('success')}}</p>
                        </div>
                    <br></br>
                    @endif

                    @if(Session::has('delete'))
                        <div class="btn btn-warning text-white" style="width:100%; height:40px">
                            <p>{{Session::get('delete')}}</p>
                        </div>
                    <br></br>
                    @endif

                    @if(Session::has('update'))
                        <div class="btn btn-info text-white" style="width:100%; height:40px">
                             <p>{{Session::get('update')}}</p>
                        </div>
                    <br></br>
                    @endif

                    @if(Session::has('failed'))
                        <div class="btn btn-danger text-white" style="width:100%; height:40px">
                            <p>{{Session::get('delete')}}</p>
                        </div>
                    <br></br>
                    @endif

                    <div class="form-validation">
                    <form class="form-valide" action="{{route('admin.youtube.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-lg-8 col-form-label" for="judul">Judul</label>
                                <div class="col-sm-12">
                                    <input type="text" id="judul" name="judul" class="form-control" required="" placeholder="Judul" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-8 col-form-label" for="content">Konten</label>
                                <div class="col-sm-12">
                                    <textarea class="summernote" name="content" class="form-control" required="" placeholder="Konten" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-8 col-form-label" for="link">Judul</label>
                                <div class="col-sm-12">
                                    <input type="text" id="link" name="link" class="form-control" required="" placeholder="Link" >
                                    <span style="color: #ff0000; font-size: 12px">*Format link : https://www.youtube.com/embed/eCthuzNClSs</span>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-6 col-form-label" for="status_publish">Status Publish</label>
                                <div class="col-sm-12">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status_publish" class="custom-switch-input" >
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Video youtube akan terlihat secara umum di halaman utama</span>
                                </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
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

