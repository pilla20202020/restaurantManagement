@extends('frontend.layouts.app')

@section('content')
    <!-- START SECTION BREADCRUMB -->

<!-- START SECTION 404 -->
<section class="background_bg overlay_bg2 full_screen" data-img-src="assets/images/404_bg.jpg">
	<div class="container h-100">
    	<div class="row justify-content-center align-content-center h-100">
        	<div class="col-md-6 col-sm-8">
            	<div class="text-center">
                    <div class="error_txt">404</div>
                    <h4 class="text_danger">oops! Page Not Found!</h4> 
                    <h6>The page you were looking for could not be found.</h6>
                    {{-- <div class="search_form form_border pt-3 pb-4">
                        <form method="post" class="position-relative">
                            <input name="text" id="text" data-email="required" type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="btn search_icon"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div> --}}
                    <a href="{{route('homepage')}}" class="btn btn-outline-black">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION 404 -->

@endsection
