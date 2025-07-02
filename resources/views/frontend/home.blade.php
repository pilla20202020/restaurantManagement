@extends('frontend.layouts.app')
@section('title')
   Nursing Home
@stop

@section('content')
    <!-- START SECTION BANNER -->
    @if($sliders)
    <section class="banner_section p-0 full_screen">
        <div id="carouselExampleFade" class="banner_content_wrap carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                <div class="carousel-item  @if($loop->index == 0) active @endif background_bg overlay_bg_50" data-img-src="{{ asset(str_replace('\\', '/', $slider->image)) }}">
                    <div class="banner_slide_content">
                        <div class="container">
                            <!-- STRART CONTAINER -->
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-sm-12 text-center">
                                    <div class="banner_content animation text_white" data-animation="fadeInDown"
                                        data-animation-delay="0.8s">
                                        <h2 class="font-weight-bold animation text-uppercase"
                                            data-animation="fadeInDown" data-animation-delay="1s">{{$slider->title}}</h2>
                                        <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">{{$slider->caption}}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
                @endforeach
            </div>
            <div class="carousel-nav carousel_style2">
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <i class="ion-chevron-left"></i>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <i class="ion-chevron-right"></i>
                </a>
            </div>
        </div>
        <a href="#about_section" class="down down_white page-scroll">
            <span class="mouse"><span></span></span>
        </a>
    </section>
    @endif
    <!-- END SECTION BANNER -->

    <!-- Speciality -->
    <section id="speciality">
        <div class="container-wrap">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 bg1">
                    <i class="fas fa-balance-scale pt-5 pb-2"></i>
                    <h6 class="text-center pt-2">
                        Justice
                    </h6>
                    <p>We believe social just is the underpinning factor for holistic justice and harmony. Equity within the distribution of and access to resources can promote justice among people.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 bg2">
                    <i class="fas fa-check pt-5 pb-2"></i>
                    <h6 class="text-center pt-2">
                        Ethics
                    </h6>
                    <p>Ethics should be enshrined and pragmatically reflected in all public service delivery systems. It is the foundational start to balance the demand side of the people and supply side of the state.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 bg1">
                    <i class="fas fa-book-open pt-5 pb-2"></i>
                    <h6 class="text-center pt-2">
                        Opportunity
                    </h6>
                    <p>Opportunity to empower should be accessible to everyone and must be need-based. Linking to the opportunity and strengthening the capacity to reap the benefits of opportunity is our foucs.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 bg2">
                    <i class="fas fa-fist-raised pt-5 pb-2"></i>
                    <h6 class="text-center pt-2">
                        Rights
                    </h6>
                    <p>Right over a particular domain naturally creates some degree of duty. Videh envisions right and duty as two sides of the accountability equilibrium.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Speciality -->

    <!-- START SECTION ABOUT -->
    @if($about)
    <section class="small_pt small_pb overflow-hidden" id="about_section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center d-flex flex-wrap">
                <div class="col-12 col-md-6">
                    <div class="box_shadow1 bg-white overlap_section padding_eight_all">
                        <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                            <div class="heading_s1">
                                <h2>{{$about->meta_description}}</h2>
                            </div>
                            <p>{!!Str::limit($about->content, 500)!!}</p>
                            <ul class="list_none list_item">
                                <li>
                                    <div class="counter_content">
                                        <h3 class="h1 text_danger">
                                            @if(setting('nurses') !=null)
                                                <span class="counter">{{setting('nurses')}}</span>+
                                            @else
                                                <span class="counter">15</span>+
                                            @endif
                                        </h3>
                                        <h6>Certified Nurses</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="counter_content">
                                        <h3 class="h1 text_light_green">
                                            @if(setting('patients_served') !=null)
                                                <span class="counter">{{setting('patients_served')}}</span>+
                                            @else
                                                <span class="counter">15</span>+
                                            @endif
                                        </h3>
                                        <h6>Patients Served</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                        <div class="overlay_bg_30 about_img z_index_minus1">
                            <img class="w-100" src="{{asset($about->image)}}" alt="about_img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END SECTION ABOUT -->

  <!-- START SECTION EVENT -->

  @if($services)
  <!-- START SECTION CATEGORIES -->
    <section class="bg_blue_dark background_bg " data-img-src="assets/images/pattern_bg2.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center text_white animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 heading_light text-center">
                            <h2>Our Services</h2>
                        </div>
                        <p>We provide compassionate and professional home nursing services, ensuring personalized care for elderly, post-surgery recovery, chronic illness management, and more. Our experienced nurses are dedicated to delivering quality healthcare in the comfort of your home.</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="course_categories carousel_slider owl-carousel owl-theme dots_white" data-margin="15" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "576":{"items": "3"}, "1000":{"items": "4"}, "1199":{"items": "5"}}'>
                        @foreach ($services as $service)
                            <div class="item">
                                <div class="single_categories cat_style1">
                                    <a href="{{route('serviceDetail',$service->id)}}">
                                        {!! $service->icon !!}
                                        {{ $service->title }}
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- END SECTION CATEGORIES -->
  @endif

    {{-- START ALBUM SECTION --}}
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Our Gallery</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                            embarrassing hidden in the middle of text</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    @if($albums)
                    <ul class="list_none grid_filter animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <li><a href="#" class="current" data-filter="*">all</a></li>
                        @foreach ($albums as $album)
                            <li><a href="#" data-filter=".{{$album->slug}}">{{$album->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if($galleries)
                        <ul class="grid_container gutter_medium grid_col4 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                            <li class="grid-sizer"></li>
                            <!-- START PORTFOLIO ITEM -->
                            @foreach($galleries as $gallery)
                                <li class="grid_item  {{$gallery->album->slug}}">
                                    <div class="gallery_item radius_all_10">
                                        <a href="#" class="image_link">
                                             <img src="{{asset($gallery->image)}}" alt="{{$gallery->name}}">
                                        </a>
                                        <div class="gallery_content">
                                            <div class="link_container">

                                                <a href="{{asset($gallery->image)}}" class="image_popup"><span class="ripple"><i class="ion-image" ></i></span></a>

                                            </div>
                                            <div class="text_holder text_white">
                                            <h5>{{$gallery->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- END ALBUM SECTION --}}

    <!-- START SECTION COUNTER -->
    <section class="parallax_bg overlay_bg_blue_70" data-parallax-bg-image="assets/images/bg19.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.02s">
                        <div class="counter_icon">
                            <img src="assets/images/counter_icon1.png" alt="counter_icon1" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text">
                                @if(setting('patients_served') !=null)
                                    <span class="counter">{{setting('patients_served')}}</span>+
                                @else
                                    <span class="counter">15</span>+
                                @endif
                            </h3>
                            <p>Patients Served</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.03s">
                        <div class="counter_icon">
                            <img src="assets/images/counter_icon2.png" alt="counter_icon2" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text">

                                @if(setting('nurses') !=null)
                                    <span class="counter">{{setting('nurses')}}</span>+
                                @else
                                    <span class="counter">15</span>+
                                @endif
                            </h3>
                            <p>Certified Nurses</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.04s">
                        <div class="counter_icon">
                            <img src="assets/images/counter_icon3.png" alt="counter_icon3" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text">
                                @if(setting('recoveries') !=null)
                                    <span class="counter">{{setting('recoveries')}}</span>+
                                @else
                                    <span class="counter">15</span>+
                                @endif
                            </h3>
                            <p>Successful Recoveries</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.05s">
                        <div class="counter_icon">
                            <img src="assets/images/scholarship.png" alt="counter_icon4" />
                        </div>
                        <div class="counter_content">
                            <h3>
                                @if(setting('experience') !=null)
                                    <span class="counter">{{setting('experience')}}</span>+
                                @else
                                    <span class="counter">15</span>+
                                @endif
                            </h3>
                            <p>Years of Experience </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COUNTER -->


    @if($blogs)
    <!-- START SECTION BLOG -->
<section class="bg_gray">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                data-animation-delay="0.01s">
                <h2>Our Blogs</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <div class="blog_post box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                @if($blog->image)
                <div class="blog_img">
                    <a href="{{route('blogdetail',$blog->slug)}}">
                        <img src="{{$blog->image}}" alt="blog_small_img1">
                        <div class="link_blog">
                            <span class="ripple"><i class="fa fa-link"></i></span>
                        </div>
                    </a>
                </div>
                @else
                <div class="blog_img radius_ltrt_10">
                    <a href="{{route('blogdetail',$blog->slug)}}"><img src="{{asset('assets/images/download.png')}}"
                            height="230px"
                            alt="event_img1"/></a>
                            <div class="link_blog">
                                <span class="ripple"><i class="fa fa-link"></i></span>
                            </div>
                </div>
                @endif
                <div class="blog_content bg-white">
                    <h6 class="blog_title"><a href="{{route('blogdetail',$blog->slug)}}">{{$blog->title}}</a></h6>
                    <p>{{$blog->meta_description}}</p>
                    <a href="{{route('blogdetail',$blog->slug)}}" class="text-capitalize">Read More</a>
                </div>
                <div class="blog_footer bg-white">
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ion-calendar"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                <div class="medium_divider"></div>
                <a href="{{route('blogs')}}" class="btn btn-default rounded-0">View All Blog <i
                        class="ion-ios-arrow-thin-right ml-1"></i></a>
            </div>
        </div>
    </div>
</div>
</section>
<!-- END SECTION BLOG -->
@endif



    <!-- START SECTION TESTIMONIAL -->
    <section class="testimonial">
        <div class="testimonial_detail">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        @if($testimonials)
                        <div class="animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                            <div class="heading_s1">
                                <h2 style="border-bottom: 1px solid #fff;">what our client Says</h2>
                            </div>
                            <div class="small_divider clearfix"></div>
                            <div class="testimonial_slider testimonial_style4 carousel_slider owl-carousel owl-theme nav_bottom_right pr-lg-4 animation"
                                data-margin="30" data-loop="true" data-autoplay="true" data-dots="false" data-nav="true"
                                data-autoheight="true" data-animation="fadeInLeft" data-animation-delay="0.02s"
                                data-items="1">
                                @foreach ($testimonials as $testimonial)
                                <div class="testimonial_box">
                                    <div class="testi_meta">
                                        <div class="testi_desc">
                                            <p>{!!$testimonial->content!!}</p>

                                        </div>
                                    </div>
                                    @if($testimonial->image)
                                    <div class="testimonial_img">
                                        <img class="radius_all_5" src="{{$testimonial->image}}" alt="user1">
                                    </div>
                                    @else
                                    <div class="testimonial_img">
                                        <img class="radius_all_5" src="{{asset('assets/images/blank-profile-picture-973460_640.png')}}" alt="user1">
                                    </div>
                                    @endif
                                    <div class="testi_user">
                                        <h6>{{$testimonial->title}}</h6>
                                        <span class="text_default">{{$testimonial->designation}}</span>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    {{-- @if($videos)
                    <div class="col-md-5 offset-md-1 col-12 pb-video">
                        <h2 class="text-center pt-5">{{$videos->title}}</h2>
                        <!-- <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="440" type="text/html" src="https://www.youtube.com/embed/QbRnydHoesY?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtubeembedcode.com" class="pt-5" ><div><small><a href="https://youtubeembedcode.com/en">youtubeembedcode.com/en/</a></small></div><div><small><a href="http://add-link-exchange.com">Add-link-exchange</a></small></div><div><small><a href="https://youtubeembedcode.com/nl/">youtubeembedcode nl</a></small></div><div><small><a href="http://add-link-exchange.com">add-link-Exchange</a></small></div></iframe> -->
                        <video width="100%" height="250" controls preload="auto" poster="url('')" loop>
                            <source src="{{asset($videos->image)}}" type="video/mp4">
                      </video>

                    </div>
                    @else --}}
                    <div class="col-md-5 offset-md-1 col-12 pb-video">
                        <h2 class="text-center pt-5">Social Video</h2>
                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/M9gopSGhmuE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIAL -->

    <!--  START SECTION TIMELINE  -->

    <!--  END SECTION TIMELINE  -->

@endsection

