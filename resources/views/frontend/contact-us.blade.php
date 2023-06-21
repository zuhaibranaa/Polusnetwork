@extends('layouts.app')
@section('content')
    <section id="contact" class="contact-area pt-70 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span class="sub-title">Contact Us</span>
                        <h2 class="title"><span>Contact</span> Polus Network Network</h2>
                    </div>
                </div>
            </div>
            <div class="contact-info-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <span class="icon-background"></span>
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="content">
                                <p>company@gmail.com <br> infoweb@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <span class="icon-background"></span>
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="content">
                                <p>+84 0977425031<br> +998 765 775 34</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <span class="icon-background"></span>
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="content">
                                <p>State/province/area: <br>Georgia 198</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrap">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-grp">
                                <input type="text" placeholder="Enter your Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                <input type="email" placeholder="Enter you email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-grp">
                        <textarea name="massage" placeholder="Enter your massage"></textarea>
                    </div>
                    <div class="submit-btn text-center">
                        <button type="submit" class="btn">Send Massage</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
