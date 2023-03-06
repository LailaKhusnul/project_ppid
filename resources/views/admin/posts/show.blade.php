@extends('layouts.frontend.appnew')
@extends('layouts.frontend.konten')

@section('content')


  <div class="body-inner">

    @include('layouts.frontend.topbar')
    <!--/ Topbar end -->
<!-- Header start -->
@include('layouts.frontend.header')
<!--/ Header end -->

<div class="px-2 bg-light"><marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="10" behavior="scroll">
  <h6 style="color: #ffb600; font-size: 18px;" >Halaman Pratinjau Berita Website PPID Kota Madiun</h6>
    </marquee></div>


<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

   @forelse($data as $detail)
          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">  
              <h2 class="entry-title" style="margin-top:-20px;">
                 {{$detail->judul}}
              </h2>
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> {{$detail->users->name}}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> {{$detail->kategori->nama_kategori}}</a>
                </span>
                <span class="post-comment"><i class="far fa-calendar"></i>
                      <a href="#" class="comments-link"> {{ date('d M Y', strtotime($detail->tgl_post)) }}</a></span>
              </div>
            
            </div><!-- header end -->
                    <div class="post-content post-single">
                      <div class="post-media post-image">
                      @if ($detail->thumbnail == null)
                            @else
                            <img loading="lazy" src="{{ route('menu.file', encrypt($detail->thumbnail)) }}" class="img-fluid" style="text-align: center;" alt="thumbnail Default">  <br>
                            @endif
                      </div>
            <div class="entry-content">
              <p>{!! $detail->contents !!}</p>
            </div>

            <hr>
            <div class="meta-bottom">
                <h8 style="background-color:yellow;"><i class="fas fa-tags"></i> Tag</h1>
                <ul class="tags">
                  @foreach ($detail->tags as $tag)
                      <li><a href="#">{{ $tag->jenis_tag }}</a></li>
                   @endforeach
               
                </ul>
              </div><!-- End meta bottom -->
              <hr>
            <div class="sidebar sidebar-right">
              <div class="widget recent-posts">
                <h3 class="widget-title" style="margin-left:-20px; font-size: 25px;">Lampiran</h3>
              </div>
            </div>
            
            <div class="banner-carousel banner-carousel-1 mb-0">
            @php
                $count = 0;
                @endphp
                @if ($detail->documents->isEmpty())
          @else
                
                @foreach ($galleries as $galeri)

                <div class="banner-carousel-item <?php 
                if($count==0){
                  echo "active";  
                }
                else{
                    echo " ";
                } ?>" style="background-image:url({{route('menu.file', encrypt($galeri->path_file))}}); text-align: center;">
            <div class="slider-content text-left">
                <div class="container h-100">
                  <div class="row align-items-center h-100">
                  </div>
                </div>
            </div>
              </div>
            @php
                $count++;
                @endphp
                @endforeach
                @endif

                </div><!-- End post author -->

            @empty
            @endforelse

            <br>

            @if ($files != null)

            @foreach($files as $file)

            <iframe src="{{ route('menu.file', encrypt($file->path_file)) }}" name="iframe_a"  width="100%" height="600" style="border:1px solid black;"></iframe> <br>
            <a href="{{ route('menu.file', encrypt($file->path_file)) }}" target="_blank"> <button  class="btn btn-info" style="border-radius: 20px; margin-top:15px;" >Download File</button></a><br><br>
            
            @endforeach
            @endif

            <div class="tags-area d-flex align-items-center justify-content-between">
              <!-- <div class="post-tags">
                <a href="#">Construction</a>
                <a href="#">Safety</a>
                <a href="#">Planning</a>
              </div>
              <div class="share-items">
                <ul class="post-social-icons list-unstyled">
                  <li class="social-icons-head">Share:</li>
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>-->
            </div> 

          </div>
          <!-- post-body end -->
        </div>
        <!-- post content end -->
      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
        <div class="sidebar-item search-form">
            <h3 class="widget-title" style="margin-left:20px;">Search</h3>
                <form action="{{ route('reader.search.berita') }}" method="POST"  class="mt-3" style="margin-left:20px;">
                  @csrf
                    <input type="text" value="{{ old('cari') }}" name="cari" style="padding-right:10px; padding-left:10px;">  <input type="submit" value="Search" style="color:white;"><i class="bi bi-search"></i></input>
                </form>
          </div><!-- End sidebar search formn-->
          <br>
          <div class="widget recent-posts">
          <h3 class="widget-title">Berita Terkini</h3>
            <ul class="list-unstyled">
                @foreach($beritaterkini as $data)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="img" src="{{ route('menu.file', encrypt($data->thumbnail)) }}"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                  <?php $date = DateTime::createFromFormat("Y-m-d", $data->tgl_post);?>
                    <a href="{{ route('contents_blog', ['year'=>$date->format("Y"), 'month' => $date->format("m") , 'day' => $date->format("d"), 'slug'=>$data->slug] ) }}">{{  $data->judul }}</a>
                  </h4>
                </div>
              </li><!-- 1st post end-->
              @endforeach
            </ul>

          </div><!-- Recent post end -->
         
          <div class="widget">
            <h3 class="widget-title">Kategori</h3>
            <ul class="arrow nav nav-tabs">
            @foreach($categories as $kategori)
                <li><a href="{{ route('contents_kategori', $kategori->slug) }}">{{ $kategori->nama_kategori }} <span>({{ $kategori->posts->count() }})</span></a></li>
            @endforeach
            </ul>
        </div>
        <!-- Categories end -->

          <div class="widget widget-tags">
            <h3 class="widget-title">Tags </h3>

            <ul class="list-unstyled">
              <li><a href="#">Construction</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Project</a></li>
              <li><a href="#">Building</a></li>
              <li><a href="#">Finance</a></li>
              <li><a href="#">Safety</a></li>
              <li><a href="#">Contracting</a></li>
              <li><a href="#">Planning</a></li>
            </ul>
          </div><!-- Tags end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
 @include('layouts.frontend.footer')<!-- Footer end -->

@endsection
