@extends('frontend.layouts.app')


@section('content')
<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" style="background-image: url({{asset('assets/images/reliance/webreliance-banner-1.png')}})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 text-center">
                <div class="page-title">
                    <h1>Search</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->


<!-- START SECTION DOWNLOADS -->

<section>
    <div class="container">
        @if(!empty($links) || !empty($form_links))
            @foreach($links as $link)
            <div class="row" style="background-color: whitesmoke;margin-top: 20px;">
                <div class="">
                    <div class="content_desc">
                        <h4 class="content_title"><a href="{{$link->slug}}" style="color: #000">{{$link->title}}</a></h4>
                        <h6><a href="{{$link->slug}}" style="color: #000;"><u>View</a></u></h6>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($form_links as $form_link)
            <div class="row" style="background-color: whitesmoke;margin-top: 20px;">
                <div class="">
                    <div class="content_desc">
                        <h4 class="content_title"><a href="{{route('formdetail',$form_link->id)}}" style="color: #000">{{$form_link->title}}</a></h4>
                        <h6><a href="{{route('formdetail',$form_link->id)}}" style="color: #000;"><u>View</a></u></h6>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="row" style="background-color: #fff;margin-top: 15px;display: block;">


                    <div class="content_desc row justify-content-center" >
                        <h4 class="content_title" style="color:#ea1d24">No Search Result(s) Found for this Keyword. Try with another Keyword.</h4>
                    </div>


                    <form method="get" action="{{route('search.link')}}">
                        <div class="row justify-content-center">
                            <input type="text" placeholder="Search" class="form-control col-md-8" name="keyword" id="search_input">
                            <button type="submit" class="col-md-2 btn btn-search">Search</button>
                        </div>
                    </form>

            </div>
        @endif

    </div>
</section>
<!-- END SECTION DOWNLOADS -->




@endsection
