<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PPID Pemerintah Kota Madiun</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon
================================================== -->
  <!-- <link rel="icon" type="image/png" href="{{ asset ('frontend/images/favicon.png')}}"> -->
  <!-- Favicons -->
  <link href="{{ asset('backend2/assets/img/Lambang_Kota_Madiun.png') }}" rel="icon">
  <link href="{{ asset('backend2/assets/img/Lambang_Kota_Madiun.png') }}" rel="apple-touch-icon">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset ('frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  

  <link rel="stylesheet" href="{{ asset ('frontend/plugins/animate-css/animate.css')}}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset ('frontend/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset ('frontend/plugins/slick/slick-theme.css')}}">
  <!-- Colorbox -->

  <link rel="stylesheet" href="{{ asset ('frontend/plugins/colorbox/colorbox.css')}}">

  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset ('frontend/css/style.css')}}">

   <!-- Libraries Stylesheet -->
 <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{ asset ('frontend/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('frontend/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
   <link href="frontend/lib/animate/animate.min.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="frontend/slick/slick.css"/>
  	<link rel="stylesheet" type="text/css" href="frontend/slick/slick-theme.css"/>
    
</head>
<body onload="loader()">

<div id="loading">
            <span class="loader"></span>
            <div class="textLoader">
                <center>
                <b>Loading ... </b>
                </center>
            </div>
        </div>
        @include('layouts.frontend.popup')
<!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset ('frontend/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset ('frontend/plugins/bootstrap/bootstrap.min.js')}}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{ asset ('frontend/plugins/slick/slick.min.js')}}"></script>
  <script src="{{ asset ('frontend/plugins/slick/slick-animation.min.js')}}"></script>
  <!-- Color box -->
  <script src="{{ asset ('frontend/plugins/colorbox/jquery.colorbox.js')}}"></script>
  <!-- shuffle -->
  <script src="{{ asset ('frontend/plugins/shuffle/shuffle.min.js')}}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{ asset ('frontend/plugins/google-map/map.js')}}" defer></script>

  <script src="frontend/lib/wow/wow.min.js"></script>
  <script src="frontend/lib/easing/easing.min.js"></script>
  <script src="frontend/lib/waypoints/waypoints.min.js"></script>
  <script src="frontend/lib/counterup/counterup.min.js"></script>
 <!-- JS Libraies -->
  <script src="{{('frontend/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendorss/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendorss/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Template custom -->
  <script src="{{ asset ('frontend/js/script.js')}}"></script>

  <script id="aioa-adawidget" src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=#d1202f&token=&position=bottom_left"></script>

<!-- Content Kedua-->


<script ttype="text/javascript">

    $(document).ready(function() {


        $('#jadwal_rapat').DataTable( {
            scrollCollapse: true,
            paging:         true
        } );

    } );
  
</script>
<script>
              // set delay 10s
              var delay = 1000;
             
             function loader() {
                 setTimeout(function(){
                     $("#loading").hide();
                     $(".loader").hide();
                 },delay);
             };
             </script>

<script ttype="text/javascript">

$(document).ready(function() {


    $('#jadwal_rapat').DataTable( {
         retrieve: true,
         paging: false
    });

});

</script>

<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.summernote').summernote();
});
</script>
<script type="text/javascript" src="frontend/slick/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.your-class').slick({
infinite: true,
slidesToShow: 2,
slidesToScroll: 2
});
});
</script>

<script type="text/javascript"> 
      $(document).ready(function(){
        $("ul.tabs").tabs("div.panes > div");
      });
   </script>
   
<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
  </div><!-- Body inner end -->

  <script>
   $(function() {
     $('.pop').on('click', function() {
       $('.imagepreview').attr('src',$(this).find('img').attr('src'));
       $('#imagemodal').modal('show');   
       });		
   });
</script>
  @yield('content')
  </body>

  </html>
