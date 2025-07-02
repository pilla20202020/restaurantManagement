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
                        <h1>{{$events->title}}</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->
    <!-- START NOTICE SECTION -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single_post">
                        @if($events->image)
                        <div class="blog_img">
                            <img src="{{asset($events->image)}}" alt="blog_img1">
                        </div>
                        @else
                            <div class="content_img">
                                <img src="{{asset('assets/images/download.png')}}"
                                                height="350px"
                                                alt="event_img1"/>
                            </div>
                        @endif
                        <div class="single_post_content">
                            <div class="blog_text">
                                <h3>{{$events->title}}</h3>
                                <p>{!!$events->content!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                    <div class="sidebar">

                        <div class="widget widget_recent_post ">
                            <h5 class="widget_title">Recent events</h5>

                            <ul class="recent_post border_bottom_dash list_none">
                                @foreach ($recent as $events)
                                <li>
                                    <div class="post_footer">
                                        @if($events->image)
                                        <div class="post_img">
                                            <a href="{{route('eventdetail',$events->slug)}}"><img
                                                    src="{{asset($events->image)}}"></a>
                                        </div>
                                        @else
                                        <div class="post_img">
                                            <a href="{{route('eventdetail',$events->slug)}}"><img
                                                    src="{{asset('assets/images/download.png')}}" height="50" width="90"></a>
                                        </div>
                                        @endif
                                        <div class="post_content">
                                            <h6><a href="{{route('eventdetail',$events->slug)}}">{{$events->title}}</a></h6>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END NOTICE SECTION -->

@endsection
