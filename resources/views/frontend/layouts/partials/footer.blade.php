
    <!-- START FOOTER -->

    <div class="call-to-action">
        <div class="row">
            <div class="col-md-10 col-12">
                <h2><i class="fa fa-phone fa-rotate-90" aria-hidden="true"></i> If You Have Any Questions Call Us On <span>{{ setting('phone') }}</span></h2>
            </div>
            <div class="col-md-2 col-12">
                <a href="{{route('contact')}}" class="btn btn-default">Appointment</a>
            </div>
        </div><!-- row /-->
    </div>


    <footer class="footer_light bg-light py-5">
        <div class="container">
            <div class="row">
                <!-- Logo & About -->
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="footer_logo mb-3">
                        <a href="{{ route('homepage') }}">
                            <img alt="logo" src="{{ asset('assets/images/logo.png') }}" class="img-fluid" style="max-height: 100px;">
                        </a>
                    </div>
                    @if(setting('nursing_home'))
                        <p class="text-muted">{{ setting('nursing_home') }}</p>
                    @endif
                    <p class="text-muted mt-3">We are dedicated to providing the best care and services to our community.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-12 mb-4 mb-lg-0 mt-5">
                    <h6 class="widget_title text-dark mb-4">Quick Links</h6>
                    <ul class="list-unstyled widget_links">
                        <li>
                            <a href="{{ route('homepage') }}" class="text-muted">
                                <i class="fas fa-home mr-2"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-muted">
                                <i class="fas fa-info-circle mr-2"></i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}" class="text-muted">
                                <i class="fas fa-images mr-2"></i> Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-muted">
                                <i class="fas fa-envelope mr-2"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mt-5">
                    <h6 class="widget_title text-dark mb-4">Contact Us</h6>
                    <ul class="list-unstyled contact_info">
                        @if(setting('address'))
                        <li class="mb-3">
                            <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                            <address class="d-inline text-muted">{{ setting('address') }}</address>
                        </li>
                        @endif
                        @if(setting('email'))
                        <li class="mb-3">
                            <i class="fa fa-envelope text-primary mr-2"></i>
                            <a href="mailto:{{ setting('email') }}" class="text-muted">{{ setting('email') }}</a>
                        </li>
                        @endif
                        @if(setting('phone'))
                        <li>
                            <i class="fa fa-phone fa-rotate-90 text-primary mr-2"></i>
                            <a href="tel:{{ setting('phone') }}" class="text-muted">{{ setting('phone') }}</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-lg-3 col-md-6 col-12 mt-5">
                    <h6 class="widget_title text-dark mb-4">Follow Us</h6>
                    <ul class="list-inline social-icons">
                        @if(setting('facebook'))
                        <li class="list-inline-item">
                            <a href="{{ setting('facebook') }}" class="text-primary"><i class="fab fa-facebook-f fa-1x"></i></a>
                        </li>
                        @endif
                        @if(setting('twitter'))
                        <li class="list-inline-item">
                            <a href="{{ setting('twitter') }}" class="text-primary"><i class="fab fa-twitter fa-1x"></i></a>
                        </li>
                        @endif
                        @if(setting('linkedin'))
                        <li class="list-inline-item">
                            <a href="{{ setting('linkedin') }}" class="text-primary"><i class="fab fa-linkedin-in fa-1x"></i></a>
                        </li>
                        @endif
                        @if(setting('instagram'))
                        <li class="list-inline-item">
                            <a href="{{ setting('instagram') }}" class="text-primary"><i class="fab fa-instagram fa-1x"></i></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="bottom_footer border-top py-3 mt-4">
            <div class="container text-center">
                <p class="m-0 text-muted">© {{ date('Y') }} All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- END FOOTER -->
