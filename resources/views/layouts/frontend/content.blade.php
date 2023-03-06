<section id="ts-features" class="ts-features pb-2">
  <div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h2 class="section-title" style="text-align:center;">Informasi Terkait</h2>
        <h3 class="section-sub-title" style="text-align:center;">Berita Terkini</h3>
      </div>
      @foreach($beritaterkini as $data)
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{$data->thumbnail}}" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-box-img">
                    <img loading="lazy" src="{{asset('frontend/images/icon-image/service-icon3.png')}}" alt="service-icon" />
                </div>
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="service-single.html">{{$data->judul}}</a></h3>
                    <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> {{$detail->users->name}}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> {{$detail->kategori->nama_kategori}}</a>
                </span>
                <span class="post-comment"><i class="far fa-calendar"></i>
                  <a href="#" class="comments-link"> {{ date('d M Y', strtotime($detail->tgl_post)) }}</a></span>
                    
                  <p>{!! $data->contents !!}...</p>
                    <a class="learn-more d-inline-block" href="{{ route('contents_blog', ['year'=>$date->format("Y"), 'month' => $date->format("m") , 'day' => $date->format("d"), 'slug'=>$beritaItem->slug] ) }}"  aria-label="service-details"><i class="fa fa-caret-right"></i> Selanjutnya</a>
                </div>
              </div>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->
        @endforeach
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->