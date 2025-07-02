@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Videos</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('homepage') }}">गृहपृष्ठ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Videos</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION GALLERY -->
<section>
	<div class="container">
    	<div class="row">
            <div class="col-md-12 text-center">
                @if($albums->isNotEmpty())
                    <ul class="list_none grid_filter">
                        <li><a href="#" class="current" data-filter="*">Videos</a></li>

                    </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if($galleries->isNotEmpty())
                    <ul class="grid_container gutter_medium grid_col6" >
                        <li class="grid-sizer"></li>
                        <!-- START PORTFOLIO ITEM -->
                        @foreach($galleries as $gallery)
                            <li class="grid_item  {{$gallery->album->slug}}">

                                @if($gallery->album->slug == "videos")
                                    <div class="">
                                        <iframe width="500" height="315" src="{{$gallery->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END SECTION GALLERY -->
@endsection
