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
                       <h1>{{$sectors->title}}</h1>
                   </div>
               </div>
               <div class="col-sm-6">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb justify-content-sm-end">
                           <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Sectors</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
   </section>
   <!-- END SECTION BANNER -->

   @if($sectors)
    <!-- SECTOR SECTION STARTS -->
   <section>
       <div class="container">
           <div class="row">
            <div class="col-lg-9">
                <div class="single_post">
                    <div class="blog_img">
                        <a href="#">
                            <img src="{{asset($sectors->image)}}" alt="blog_img1">
                        </a>
                    </div>
                    <div class="single_post_content">
                        <div class="blog_text">
                            <h3>{{$sectors->title}}</h3>
                            <p>{!!$sectors->content!!}</p>
                        </div>
                    </div>
                </div>
            </div>
               <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                   <div class="sidebar">
                        @if($events)
                       <div class="widget widget_recent_post ">
                           <h5 class="widget_title">Recent Events</h5>

                           <ul class="recent_post border_bottom_dash list_none">
                                @foreach ($events as $event)
                                <li>
                                    <div class="post_footer">
                                        @if($event->image)
                                        <div class="post_img">
                                            <a href="{{route('eventdetail',$event->slug)}}"><img
                                                    src="{{asset($event->image)}}"></a>
                                        </div>
                                        @else
                                        <div class="post_img">
                                            <a href="{{route('eventdetail',$events->slug)}}"><img
                                                    src="{{asset('assets/images/download.png')}}" height="50" width="90"></a>
                                        </div>
                                        @endif
                                        <div class="post_content">
                                            <h6><a href="{{route('eventdetail',$event->slug)}}">{{$event->title}}</a></h6>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                           </ul>
                       </div>
                       @endif

                       @if($news)
                       <div class="widget widget_recent_post ">
                           <h5 class="widget_title">Recent News</h5>

                           <ul class="recent_post border_bottom_dash list_none">
                                @foreach ($news as $newz)
                                <li>
                                    <div class="post_footer">
                                        @if($newz->image)
                                        <div class="post_img">
                                            <a href="{{route('newsdetail',$newz->slug)}}"><img
                                                    src="{{asset($newz->image)}}"></a>
                                        </div>
                                        @else
                                        <div class="post_img">
                                            <a href="{{route('newsdetail',$newz->slug)}}"><img
                                                    src="{{asset('assets/images/download.png')}}" height="50" width="90"></a>
                                        </div>
                                        @endif
                                        <div class="post_content">
                                            <h6><a href="{{route('newsdetail',$newz->slug)}}">{{$newz->title}}</a></h6>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                           </ul>
                       </div>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </section>
    <!-- SECTOR SECTION ENDS -->
   @endif
@endsection
