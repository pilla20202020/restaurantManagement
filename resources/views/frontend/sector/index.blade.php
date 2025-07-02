@extends('frontend.layouts.app')
@section('title')
   Nursing Home
@stop

@section('content')
    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50"
        data-parallax-bg-image="{{asset('assets/images/about_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>All Sectors</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">sectors</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->
    @if($sectors)
        <!-- START sectors SECTION -->
        <section class="small_pt">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($sectors as $sector)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp"
                                data-animation-delay="0.01s">
                                <div class="blog_img radius_ltrt_10">
                                    @if($sector->image)
                                    <a href="{{route('sectordetail',$sector->slug)}}">
                                        <img src="{{asset($sector->image)}}" alt="blog_small_img1">
                                        <div class="link_blog">
                                            <span class="ripple"><i class="fa fa-link"></i></span>
                                        </div>
                                    </a>
                                    @else
                                    <div class="blog_img radius_ltrt_10">
                                        <a href="{{route('sectordetail',$sector->slug)}}"><img src="{{asset('assets/images/download.png')}}"
                                                height="270px"
                                                alt="event_img1"/></a>
                                                <div class="link_blog">
                                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                                </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="blog_content bg-white">
                                    <h6 class="blog_title"><a href="{{route('sectordetail',$sector->slug)}}">{{$sector->title}}?</a></h6>
                                    <p>{{$sector->meta_description}}</p>
                                    <a href="{{route('sectordetail',$sector->slug)}}" class="text-capitalize">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- END sectors SECTION -->
    @endif
@endsection
