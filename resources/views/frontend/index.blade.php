@extends('layouts.app')

@section('content')
    <!-- main-area -->
    <main class="fix">

        <!-- banner-area -->
        <section class="banner-area banner-bg">
            <div class="banner-shape-wrap">
                <img src="{{ asset('img/banner/banner_shape01.png') }}" alt="" class="img-one">
                <img src="{{ asset('img/banner/banner_shape02.png') }}" alt="" class="img-two">
                <img src="{{ asset('img/banner/banner_shape03.png') }}" alt="" class="img-three">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="banner-content text-center">
                            <!-- <img src="assets/img/icon/fire.png" alt=""> -->
                            <h2 class="title">Invest in <span>Long Term Investment Coin Polus Network</span> and earn daily
                                rewards depending on your Investment</h2>
                        </div>
                        <!-- <div class="banner-progress-wrap">
                                            <ul>
                                                <li>Pre Sell</li>
                                                <li>Soft Cap</li>
                                                <li>Bonus</li>
                                            </ul>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="title">65% target raised <span>1 ETH = $1000 = 3177.38 CIC</span></h4>
                                        </div>  -->
                    </div>
                </div>
                <!-- <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <div class="banner-countdown-wrap text-center">
                                            <h2 class="title">Polus Network Will Start In..</h2>
                                            <div class="coming-time" data-countdown="2023/1/1"></div>
                                        </div>
                                    </div>
                                </div> -->
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area -->
        <section id="about" class="about-area pt-130 pb-130">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img wow fadeInLeft" data-wow-delay=".2s">
                            <img src="{{ asset('/img/images/Polus Network.jpeg') }}" alt="Polus Network">
                            <img src="{{ asset('/img/images/about_img02.png') }}" alt="" class="img-two">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content wow fadeInRight who_we_are" data-wow-delay=".2s">
                            <div class="section-title mb-30 ">
                                <span class="sub-title">Who we are</span>
                                <h2 class="title"><span>Polus Network</span> Long-Term Investment Coin</h2>
                            </div>
                            <p>Invest in Polus Network and earn daily rewards, start as low as 10$ and start earning right away.
                                Earn a daily percentage on your investment</p>
                            <a href="how_it_works.html" class="btn">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- partner-area -->
        <!-- <div class="partner-area pb-130">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="section-title text-center mb-10">
                                            <span class="sub-title">Our top partner</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="partner-wrap">
                                            <ul>
                                                <li>PAYONEER</li>
                                                <li>PAYPAL</li>
                                                <li>KONNECT BY HBL</li>
                                                <li>JAZZCASH</li>
                                                <li>EASYPAISA</li>
                                                <li>BANK ALFALAH</li>
                                                <li>SONERI BANK</li>
                                                <li>STANDARD CHARTERD BANK</li>
                                                <li>HBL</li>
                                                <li>FAISAL BANK</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
        <!-- partner-area-end -->

        <!-- choose-area -->
        <section class="choose-area choose_slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title text-center mb-50">
                            <span class="sub-title">why Choose us</span>
                            <h2 class="title">Why choose our <span>Polus Network</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row choose-active">
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon01.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Transaction through easypaisa/ jazzcash</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon02.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Convert your tokens to USDTs Easily</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon03.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Protect the <br> identity</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon04.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Sercurity & control over money</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="assets/img/icon/choose_icon02.svg" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Tension free transactions</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon03.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Lorem ipsum dolor sit</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="{{ asset('/img/icon/choose_icon04.svg') }}" alt="">
                            </div>
                            <div class="choose-content">
                                <h2 class="title"><a href="#">Sercurity & control over money</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit autem.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <span class="slider__label sr-only"></span>
                </div>
            </div>
        </section>
        <!-- choose-area-end -->

        <!-- area-bg -->
        <div class="area-bg">

            <!-- document-area -->
            <!-- <section class="document-area pt-60">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7 order-2 order-lg-0">
                                            <div class="document-img text-center wow fadeInUp" data-wow-delay=".2s">
                                                <img src="assets/img/images/document_img.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="document-content mt-50 wow fadeInRight" data-wow-delay=".2s">
                                                <div class="section-title mb-35">
                                                    <span class="sub-title">Whitepaper</span>
                                                    <h2 class="title">Read <span>Polus Network Network Documents</span></h2>
                                                </div>
                                                <ul class="document-list">
                                                    <li>Newsletters</li>
                                                    <li>Privacy Policy</li>
                                                    <li>Terms Of Coin Sale</li>
                                                    <li>Terms of Transactions</li>
                                                </ul>
                                                <a href="#" class="btn">Download Doc</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> -->
            <!-- document-area-end -->


        </div>
        <!-- area-bg-end -->

        <!-- team-area -->
        <!-- <section class="team-area pt-130">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="section-title text-center mb-70">
                                            <h2 class="title">The Leadership <br> <span>Team</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img01.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Founder & CO</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img02.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Head of Design</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img03.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Vp People</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img04.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Product Manager</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img05.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Marketer</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img06.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Founder</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img07.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Account Manager</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="team-item">
                                            <div class="team-thumb">
                                                <img src="assets/img/team/team_img08.png" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h2 class="title">Cameron Williamson</h2>
                                                <span>Founder & CO</span>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
        <!-- team-area-end -->


    </main>
@endsection
