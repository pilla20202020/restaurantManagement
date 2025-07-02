@extends('frontend.layouts.app')


@section('content')
    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50"
        data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->
    <!-- CONTACT FORM SECTION -->
    <section class="small_pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                        data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                        <div class="heading_s1 text-center">
                            <h2>Get In Touch</h2>
                        </div>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box_shadow1 radius_all_10">
                        <div class="row no-gutters">
                            <div class="col-md-6 animation animated fadeInLeft" data-animation="fadeInLeft" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                                @if(Illuminate\Support\Facades\Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Illuminate\Support\Facades\Session::get('success')}}
                                    </div>
                                @endif
                                <div class="padding_eight_all">
                                    <div class="field_form">
                                        <form method="post" name="enq" action="{{route('send-contact')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <input required="required" placeholder="Enter Name" id="first-name" class="form-control" name="full_name" type="text">
                                                </div>
                                                <div class="form-group col-12">
                                                    <input required="required" placeholder="Enter Email" id="email" class="form-control" name="email_address" type="email">
                                                </div>
                                                <div class="form-group col-12">
                                                    <input required="required" placeholder="Enter Phone No." id="phone" class="form-control" name="phone_number" type="tel">
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <textarea required="required" placeholder="Message" id="description"
                                                        class="form-control" name="message" rows="3"></textarea>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" title="Submit Your Message!" class="btn btn-default" name="submit" value="Submit">Submit</button>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <div id="alert-msg" class="alert-msg text-center"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animation animated fadeInRight" data-animation="fadeInRight" data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                                <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                                    <!-- <iframe src="{{setting('google_map')}}" allowfullscreen=""></iframe> -->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d56529.64363409014!2d85.3163051184924!3d27.68321969714603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39eb19b1923a15c3%3A0x8fab2e10d8482402!2saccessworld!3m2!1d27.6794199!2d85.3196747!5e0!3m2!1sen!2snp!4v1618810226314!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- END CONTACT FORM SECTION -->
    <section class="small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                        data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                        <div class="heading_s1 text-center">
                            <h2>Contact Information</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @if(setting('phone'))
                    <div class="overlay_bg_danger_90 icon_box text-center  radius_all_10 background_bg animation animated fadeInUp"
                        data-img-src="https://demo1.accessworld.net/projects/kcgroup/public/assets/images/address_img.jpg"
                        data-animation="fadeInUp" data-animation-delay="0.02s"
                        style="background-image: url(&quot;assets/images/address_img.jpg&quot;); background-position: center center; background-size: cover; animation-delay: 0.02s; opacity: 1;">
                        <div class="box_icon mb-3">
                            <i class="fas fa-fax"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Fax</h5>
                            <p class="text-dark"><strong>{{setting('phone')}}</strong></p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if(setting('phone'))
                    <div class="overlay_bg_light_green_90 icon_box text-center  radius_all_10 background_bg animation animated fadeInUp"
                        data-img-src="https://demo1.accessworld.net/projects/kcgroup/public/assets/images/call_img.jpg"
                        data-animation="fadeInUp" data-animation-delay="0.03s"
                        style="background-image: url(&quot;assets/images/call_img.jpg&quot;); background-position: center center; background-size: cover; animation-delay: 0.03s; opacity: 1;">
                        <div class="box_icon mb-3">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Call Us</h5>
                            <a href="tel:{{setting('phone')}}"><strong>{{setting('phone')}}</strong></a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if (setting('email'))
                    <div class="overlay_bg_default_90 icon_box text-center  radius_all_10 background_bg animation animated fadeInUp"
                    data-img-src="https://demo1.accessworld.net/projects/kcgroup/public/assets/images/email_img.jpg"
                    data-animation="fadeInUp" data-animation-delay="0.04s"
                    style="background-image: url(&quot;assets/images/email_img.jpg&quot;); background-position: center center; background-size: cover; animation-delay: 0.04s; opacity: 1;">
                    <div class="box_icon mb-3">
                        <i class="fas fa-envelope-square"></i>
                    </div>
                    <div class="intro_desc">
                        <h5>Email</h5>
                        <a href="mailto:{{setting('email')}}"><strong>{{setting('email')}}</strong></a>
                    </div>
                </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CALL TO ACTION -->
@endsection

