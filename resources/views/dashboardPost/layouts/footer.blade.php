<!-- START FOOTER -->
<div class="footer section-padding">
    <div class="container">				
        <div class="row">						
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <a href="index.html"><img src="{{ asset('img') }}/Logo2.webp" alt=""></a>         
                    <div class="social_profile">
                        <ul>
                            <li><a href="#" class="f_facebook"><i class="fab fa-facebook-f">
                            </i></a></li>
                            <li><a href="#" class="f_twitter"><i class="fab fa-twitter">
                            </i></a></li>
                            <li><a href="#" class="f_instagram"><i class="fab fa-instagram">
                            </i></a></li>
                            <li><a href="#" class="f_youtube"><i class="fab fa-youtube">
                            </i></a></li>
                            <li><a href="#" class="f_tiktok"><i class="fab fa-tiktok">
                            </i></a></li>
                        </ul>
                    </div>
                </div>			
            </div><!--- END COL -->						
            <div class="col-lg-2 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="/view/muhammadiyah">Muhammadiyah</a></li>
                        <li><a href="/view/aisyiyah">‘Aisyiyah</a></li>
                        <li><a href="/kabar">Kabar</a></li>
                        <li><a href="/kategori/kajian">Kajian</a></li>
                        {{-- <li><a href="#">Sejarah</a></li> --}}
                        {{-- <li><a href="#">Amal Usaha</a></li> --}}
                        <li><a href="/contact-us">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->	
            <div class="col-lg-2 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <h4>Tentang</h4>
                    <ul>
                        @foreach ($sejarah as $post)
                            <li><a href="/{{ $post->slug }}">{{ $post->title }}</a></li>
                        @endforeach						
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-2 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <h4>Ekosistem</h4>
                    <ul>
                        <li><a href="shop.html">WarMA</a></li>
                        <li><a href="/amal/tkAba">TK ABA</a></li>
                        <li><a href="/amal/masjidAlAmien">Masjid Al Amien</a></li>
                        <li><a href="/amal/masjidSafinatullah">Masjid Safinatullah </a></li>
                        <li><a href="/amal/masjidBaiturohman">Masjid Baiturohman </a></li>
                        <li><a href="/amal/masjidAlIkhsan">Masjid Al Ikhsan</a></li>
                        <li><a href="/amal/masjidAlKhasanah">Mushola Al Khasanah</a></li>
                        <li><a href="/amal/masjidAlHikmah">Mushola Al Hikmah</a></li>					
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <h4>Info Kontak</h4>
                    <div class="sf_contact">
                        <span class="ti-map"></span>
                        <p>Masjid Al Amien RT. 06, Panggungharjo, Sewon, Bantul, D.I. Yogyakarta 55188</p>
                    </div>
                    <div class="sf_contact">
                        <span class="ti-mobile"></span>
                        <p>0813 1022 0430 - 0817 7953 1610</p>
                    </div>
                    <div class="sf_contact">
                        <span class="ti-mobile"></span>
                        <p><a href="tel:+88457845695">Contact Whatsapp</a></p>
                    </div>
                    <div class="sf_contact">
                        <span class="ti-email"></span>
                        <p>muhammadiyahpanggungharjo@gmail.com</p>
                    </div>
                </div>
            </div><!--- END COL -->						
            
        </div><!--- END ROW -->					
    </div><!--- END CONTAINER -->
</div>
<!-- END FOOTER -->	

<!-- START FOOTER COPYRIGHT -->	
<div class="foot_copy">
    <div class="footer_copyright">
        <p>&copy; {{ \Carbon\Carbon::now()->locale('id')->isoFormat('YYYY') }} Perserikatan Muhammadiyah</p>
    </div>	
</div>
<!-- END FOOTER COPYRIGHT -->