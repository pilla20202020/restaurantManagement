@extends('frontend.layouts.app')
@section('title')
   Nursing Home
@stop
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50"
        data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Our Gallery</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->
    {{-- START GALLERY SECTION --}}
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
    {{-- END GALLERY SECTION --}}

@endsection
