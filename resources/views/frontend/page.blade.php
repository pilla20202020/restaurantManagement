@extends('frontend.layouts.app')

@section('content')

    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50"
    data-parallax-bg-image="{{asset('assets/images/about_bg.jpg')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h1>{{$page->title}}</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </section>

    <!-- START SECTION TEACHER -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single_event">
                        @if($page->image)
                            <div class="content_img">
                                <img src="{{asset($page->image)}}" alt="{{$page->title}}">
                            </div>
                        @endif
                        <div class="event_title">
                            <h3>{{$page->title}}</h3>
                        </div>
                        <div class="entry_content">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                    <div class="sidebar">
                        @if($blogs)
                        <div class="widget widget_recent_post ">
                            <h5 class="widget_title">Recent Blogs</h5>

                            <ul class="recent_post border_bottom_dash list_none">
                                 @foreach ($blogs as $blog)
                                 <li>
                                     <div class="post_footer">
                                         @if($blog->image)
                                         <div class="post_img">
                                             <a href="{{route('blogdetail',$blog->slug)}}"><img
                                                     src="{{asset($blog->image)}}"></a>
                                         </div>
                                         @else
                                         <div class="post_img">
                                             <a href="{{route('blogdetail',$blog->slug)}}"><img
                                                     src="{{asset('assets/images/download.png')}}" height="50" width="90"></a>
                                         </div>
                                         @endif
                                         <div class="post_content">
                                             <h6><a href="{{route('blogdetail',$blog->slug)}}">{{$blog->title}}</a></h6>
                                         </div>
                                     </div>
                                 </li>
                                 @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
    </section>
    <!-- END SECTION TEACHER -->
@endsection
