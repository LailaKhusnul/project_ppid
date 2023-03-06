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

<body onload="loader()">

<div id="loading">
            <span class="loader"></span>
            <div class="textLoader">
                <center>
                <b>Loading ... </b>
                </center>
            </div>
        </div>
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
                <h1>Dashboard Sistem Informasi PPID Kota Madiun</h1>
        </div>
          <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa-solid fas fa-newspaper fa-8x"></i>
                </div>
              <div class="card-wrap">
          <div class="card-header">
            <h4>Total Berita</h4>
          </div>
            <div class="card-body">
            {{$publishall}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fa-solid fas fa-check-square fa-8x"></i>
                </div>
              <div class="card-wrap">
          <div class="card-header">
            <h4>Berita Publish</h4>
          </div>
            <div class="card-body">
            {{$publish}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fa-solid fas fa-window-close fa-8x"></i>
                </div>
              <div class="card-wrap">
          <div class="card-header">
            <h4>Draft Berita</h4>
          </div>
            <div class="card-body">
            {{$unpublish}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fa-solid fas fa-folder-open fa-8x"></i>
                </div>
              <div class="card-wrap">
          <div class="card-header">
            <h4>Total Kategori Berita</h4>
          </div>
            <div class="card-body">
            {{$categories}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fa-solid fas fa-folder-open fa-8x"></i>
                </div>
              <div class="card-wrap">
          <div class="card-header">
            <h4>Total Tag Berita</h4>
          </div>
            <div class="card-body">
            {{$tags}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-xl-6">
          <div class="card mb-4" style="background-color: #d4c7b4; margin-left:-12px;">
              <div class="card-header" >
                  <i class="fas fa-chart-area me-1"></i><b style="margin-left:5px;"> Jumlah Berita Ter-Publish Per Bulan</b>
              </div>
          <div class="card-body" ><canvas id="myBarChart" width="100%" height="40"></canvas></div>
          </div>
      </div>
      <div class="col-xl-6">
        <div class="card mb-4" style="background-color: #d4c7b4; margin-left:-12px;">
            <div class="card-header" >
                <i class="fas fa-chart-area me-1"></i><b style="margin-left:5px;"> Jumlah Berita Ter-Publish Per Tahun</b>
                    </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
                <div class="card-body">
                </div>
              </div>
            </div>
        </section>
      </div>

      @include('admin.footer')

    </div>
  </div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">pilih tombol "Logout" dibawah ini</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-check"></i>
                                         {{ __('YA') }}
        </a>
        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-times"></i> TIDAK</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
      </div>
    </div>
  </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
	var _ydata=JSON.parse('{!! json_encode($months) !!}');
	var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
</script>
<script type="text/javascript">
	var __ydata=JSON.parse('{!! json_encode($year) !!}');
	var __xdata=JSON.parse('{!! json_encode($yearsCount) !!}');
</script>
<script src="backend2/assets/demo/chart-area-demo.js"></script>
<script src="backend2/assets/demo/chart-bar-demo.js"></script>

<!-- Page level plugins -->
<script src="backend2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="backend2/js/demo/chart-pie-demo.js"></script>
<script src="backend2/js/demo/charts-pie-demo.js"></script>

  <script>
    Circles.create({
        id:'circles-1',
        radius:45,
        value:60,
        maxValue:100,
        width:7,
        text: 5,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value:70,
        maxValue:100,
        width:7,
        text: 36,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:40,
        maxValue:100,
        width:7,
        text: 12,
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets : [{
                label: "Total Income",
                backgroundColor: '#ff9e27',
                borderColor: 'rgb(23, 125, 255)',
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }],
                xAxes : [ {
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>

@endsection
