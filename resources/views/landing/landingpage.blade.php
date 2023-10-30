@extends('layouts.app')

@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row flex-md-row mx-md-0">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Selamat Datang</h6>
                                        <h2>SI SALUT PEI
                                        </h2>
                                        <p>SI SALUT PEI merupakan sistem informasi untuk pemilihan mahasiswa lulusan terbaik
                                            dapat digunakan PEI dalam memberikan rekomendasi mahasiswa lulusan terbaik.
                                            Terimakasih.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-first-button scroll-to-section">
                                            <a href="#contact">Lihat Tentang Kami</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight w-100 d-block" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img class="img-fluid" src="{{ asset('assets/digimedia/images/slider.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div id="about" class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="assets/images/about-dec-v3.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="about-right-content">
                                    <div class="section-heading">
                                        <h6>Tentang Kami</h6>
                                        <h4>SI SALUT <em>PEI</em></h4>
                                        <div class="line-dec"></div>
                                    </div>
                                    <p>We hope this DigiMedia template is useful for your work. You can use this template
                                        for any purpose. You may <a rel="nofollow" href="http://paypal.me/templatemo"
                                            target="_blank">contribute a little amount</a> via PayPal to <a
                                            href="https://templatemo.com/contact" target="_blank">support TemplateMo</a> in
                                        creating new templates regularly.</p>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s"
                                                data-wow-delay="0s">
                                                <div class="progress" data-percentage="90">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">
                                                        <div>
                                                            90%<br>
                                                            <span>Coding</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s"
                                                data-wow-delay="0s">
                                                <div class="progress" data-percentage="80">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">
                                                        <div>
                                                            80%<br>
                                                            <span>Photoshop</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s"
                                                data-wow-delay="0s">
                                                <div class="progress" data-percentage="80">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">
                                                        <div>
                                                            80%<br>
                                                            <span>Animation</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="services" class="services section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h6>Program Studi</h6>
                            <h4>Politeknik Enjinering Indorama</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="naccs">
                            <div class="grid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu">
                                            <div class="first-thumb active">
                                                <div class="thumb">
                                                    <span class="icon"><img src="assets/images/service-icon-01.png"
                                                            alt=""></span>
                                                    Teknologi <br>RPL
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <span class="icon"><img src="assets/images/service-icon-02.png"
                                                            alt=""></span>
                                                    Teknologi Manufaktur
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <span class="icon"><img src="assets/images/service-icon-03.png"
                                                            alt=""></span>
                                                    Teknologi Mekatronika
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <span class="icon"><img src="assets/images/service-icon-04.png"
                                                            alt=""></span>
                                                    Teknik <br> Listrik
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul class="nacc">
                                            <li class="active">
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-6 align-self-justify">
                                                                <div class="left-text">
                                                                    <h4>Teknologi RPL</h4>
                                                                    <p>Visi TRPL: “Menjadi pengembangan pendidikan vokasi
                                                                        terdepan dalam kawasan regional untuk komunitas
                                                                        industri guna memenuhi kebutuhan tenaga teknis yang
                                                                        kompeten di bidang Rekayasa Perangkat Lunak”. Lulus
                                                                        dari TRPL PEI kamu bakal bisa apa?</p>
                                                                    <div class="ticks-list"><span><i
                                                                                class="fa fa-check"></i> Web
                                                                            Developer</span> <span><i
                                                                                class="fa fa-check"></i> Front End</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span>
                                                                        <span><i class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span> <span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span>
                                                                    </div>
                                                                    <p>Wujudkan cita-citamu untuk menjadi Software Engineer yang dibutuhkan banyak industri dan memiliki gaji yang tinggi sesuai dengan permintaan..</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="right-image">
                                                                    <img src="{{ asset('assets/digimedia/images/services-image.jpg')}}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="left-text">
                                                                    <h4>Healthy Food &amp; Life</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt ut
                                                                        labore et dolore kengan darwin doerski token.
                                                                        dover lipsum lorem and the others.</p>
                                                                    <div class="ticks-list"><span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span> <span><i
                                                                                class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span>
                                                                        <span><i class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span> <span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="right-image">
                                                                    <img src="assets/images/services-image-02.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="left-text">
                                                                    <h4>Car Re-search &amp; Transport</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt ut
                                                                        labore et dolore kengan darwin doerski token.
                                                                        dover lipsum lorem and the others.</p>
                                                                    <div class="ticks-list"><span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span> <span><i
                                                                                class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span>
                                                                        <span><i class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span> <span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="right-image">
                                                                    <img src="assets/images/services-image-03.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="left-text">
                                                                    <h4>Online Shopping &amp; Tracking ID</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt ut
                                                                        labore et dolore kengan darwin doerski token.
                                                                        dover lipsum lorem and the others.</p>
                                                                    <div class="ticks-list"><span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span> <span><i
                                                                                class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span>
                                                                        <span><i class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span> <span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="right-image">
                                                                    <img src="assets/images/services-image-04.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="left-text">
                                                                    <h4>Enjoy &amp; Travel</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt ut
                                                                        labore et dolore kengan darwin doerski token.
                                                                        dover lipsum lorem and the others.</p>
                                                                    <div class="ticks-list"><span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span> <span><i
                                                                                class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span>
                                                                        <span><i class="fa fa-check"></i> Data Info</span>
                                                                        <span><i class="fa fa-check"></i> SEO
                                                                            Analysis</span> <span><i
                                                                                class="fa fa-check"></i> Optimized
                                                                            Template</span>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                        elit, sedr do eiusmod deis tempor incididunt.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 align-self-center">
                                                                <div class="right-image">
                                                                    <img src="assets/images/services-image.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
