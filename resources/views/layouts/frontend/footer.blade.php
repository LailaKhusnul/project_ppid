<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        @foreach($logo as $data)
        <a href="{{ $data->link }}" aria-label="Facebook" target="_blank"><img loading="lazy" width="80px" class="footer-logos" src="{{ route('menu.file', encrypt($data->icon)) }}" alt="Constra"></a>
      @endforeach
        <hr style="display:block; height: 3px;  border: 0; border-top; 3px solid #ccc;">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">Tentang Kami</h3>
            <img loading="lazy" width="80px" class="footer-logo" src="{{asset('backend2/assets/img/Lambang_Kota_Madiun.png')}}" alt="Constra">
            <img loading="lazy" width="230px" class="footer-logo" src="{{asset('frontend/images/logo_ppid.png')}}" alt="Constra">
            <p style="text-align:justify;" class="text-white">PPID Kota Madiun dikelola oleh Dinas Komunikasi dan Informatika Kota Madiun yang merupakan
                                                              unsur pelaksana pada pemerintahan bidang komunikasi, informatika, serta statistik dan persandian di Kota Madiun.</p>
            <div class="footer-social">
              <ul>
                <li ><a href="https://www.facebook.com/pemkotmadiun/" aria-label="Facebook" target="_blank"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/pemkotmadiun_" aria-label="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="https://www.instagram.com/pemkotmadiun_/" aria-label="Instagram" target="_blank"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCkolXu0GY1EdMOJ8RLOk4OQ" aria-label="Youtube" target="_blank">
                    <i class="fab fa-youtube"></i></a></li>
                    <li><a href="https://www.tiktok.com/@pemkotmadiun_" aria-label="Tiktok" target="_blank">
                        <i class="fab fa-tiktok"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Informasi</h3>
            <div class="text-white"><i class="fas fa-map-marker-alt"></i><h8 style="margin-left:15px;">Jl. Perintis Kemerdekaan No. 32 Kota Madiun</h8></div><br>
            <div class="text-white"><i class="fas fa-phone"></i><h8 style="margin-left:10px;">(0351) 467327</h8></div><br>
            <div class="text-white"><i class="fas fa-envelope"></i><h8 style="margin-left:10px;">ppid@madiunkota.go.id</h8></div><br>
            <div class="working-hours">
              <p style="text-align:justify;" class="text-white">Jam pelayanan menyesuaikan jam kerja, yaitu hari Senin-Jumat. Jika ada kepentingan mendesak, Anda dapat menghubungi kami
              melalui kontak yang tertera.</p>
              <div class="text-white">Senin - Kamis : <span class="text-right text-white">07:00 - 15:30 </span></div>
              <br>
              <div class="text-white">Jumat : <span class="text-right text-white">06:30 - 14:30</span></div><br><br>

            </div>

          </div><!-- Col end -->

          {{-- <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Informasi</h3>
            <div class="text-white"><i class="fas fa-map-marker-alt"></i><h8 style="margin-left:15px;">Jl. Perintis Kemerdekaan No. 32 Kota Madiun</h8></div>
            <div class="text-white"><i class="fas fa-phone"></i><h8 style="margin-left:10px;">(0351) 467327</h8></div>
            <div class="text-white"><i class="fas fa-envelope"></i><h8 style="margin-left:10px;">ppid@madiunkota.go.id</h8></div>
            </div> --}}

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Menu Akses</h3>
            <ul class="list-arrow">
              <li><a href="/profil-ppid-kota-madiun">Profil</a></li>
              <li><a href="/ppid-pelaksana-kota-madiun">PPID Pelaksana Kota Madiun</a></li>
              <li><a href="/daftar-informasi-publik-ppid-kota-madiun">Informasi Publik</a></li>
              <li><a href="/kategori/berita-ppid">Download</a></li>
              <li><a href="/kategori/galeri">Galeri</a></li>
            </ul>
          </div>
          <!-- Col end -->

        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span class="text-white">Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, Developed by Diskominfo Kota Madiun</span>
            </div>
          </div>

        </div><!-- Row end -->

        {{-- <div class="form-group" style="margin-top: 12%; float:right; position: relative; ">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> --}}
              <a href="https://api.whatsapp.com/send/?phone=628113577800&text&type=phone_number&app_absent=0" target="_blank" class="tooltipmake"  style="position: fixed;right: 0;  bottom: 0;margin-bottom:40px;margin-right:15px;border-radius:50%; display:block;" ><img src="{{ asset('frontend/images/icon-image/wa2.png') }}" style="height:45px;width:45px;"><span class="tooltiptext">Whatsapp Us</span></a></a>
             {{-- </div>
          </div> --}}

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed" style="margin-bottom:-20px;">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>



      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer>



