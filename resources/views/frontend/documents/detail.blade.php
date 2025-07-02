@extends ('frontend.layouts.app')
@section('content')
<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" style="background: url({{asset('assets/images/valley1.jpeg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 text-center">
                     <div class="page-title">
                        <h1>Documents</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Documents</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<!-- END SECTION BANNER -->


<!-- START SECTION documents -->

<section class="download">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="download_inner">
                    <div class="download_content">
                        <div class="download_link">
                                <a href="{{asset('uploads/form/'.$document->form)}}" target="_blank">
                            <i class="fas fa-external-link-alt mr-1" style="font-size: 13px;"></i>
                            <span class="download_title">{{$document->title}}</span>
                            </a>
                        </div>
                        <div class="download_icon">
                            <a href="{{asset('uploads/form/'.$document->form)}}" download="{{asset('uploads/form/'.$document->form)}}">
                                <i class="fas fa-download"></i>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION documents -->




@endsection
