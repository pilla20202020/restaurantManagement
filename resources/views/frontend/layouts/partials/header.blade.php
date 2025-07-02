
    <!-- START HEADER -->
    <header class="header_wrap dark_skin">
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <ul class="contact_detail list_none text-center text-md-left">
                            @if(setting('phone') !=null)
                            <li><a href="#"><i class="ti-mobile"></i>{{setting('phone')}}</a></li>
                            @endif
                            @if(setting('email') !=null)
                            <li><a href="#"><i class="ti-email"></i>{{setting('email')}}</a></li>
                            @endif
                            <li>
                                <div id="google_translate_element"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center mt-2 mt-md-0">
                            <ul class="list_none social_icons text-center text-md-right">
                                @if(setting('facebook') !=null)
                                <li><a href="{{setting('facebook')}}"><i class="ion-social-facebook"></i></a></li>
                                @endif
                                @if(setting('twitter') != null)
                                <li><a href="{{setting('twitter')}}"><i class="ion-social-twitter"></i></a></li>
                                @endif
                                @if(setting('instagram') != null)
                                <li><a href="{{setting('instagram')}}"><i class="ion-social-instagram"></i></a></li>
                                @endif
                                @if(setting('youtube') != null)
                                <li><a href="{{setting('youtube')}}"><i class="ion-social-youtube"></i></a></li>
                                @endif

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('homepage')}}">
                    <img class="logo_dark" src="{{asset('assets/images/logo.png')}}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        {{-- @foreach(menus() as $menu)
                            <?php
                            // $hasSub = !$menu->subMenus->isEmpty();
                            ?>
                            <li class="{{($hasSub) ? "dropdown" : ""}}">
                                <a class="{{($hasSub) ? "dropdown-toggle" : ""}} nav-link" href="{{ url($menu->url) }} "
                                   data-toggle="{{($hasSub) ? "dropdown" : ""}}">
                                    {{$menu->name}}
                                </a>
                                @if($hasSub)
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach($menu->subMenus->sortBy('order') as $key => $sub)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item"
                                                       href="{{url($sub->url)}}">{{ $sub->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach --}}
                        @foreach(menus() as $menu)
                            <?php
                            $hasSub = !$menu->subMenus->isEmpty() || $menu->name == "Services"; // Check if it has submenus or is "Services"
                            ?>
                            <li class="{{ $hasSub ? 'dropdown' : '' }}">
                                <a class="{{ $hasSub ? 'dropdown-toggle' : '' }} nav-link" href="{{ url($menu->url) }}"
                                data-toggle="{{ $hasSub ? 'dropdown' : '' }}">
                                    {{ $menu->name }}
                                </a>
                                @if($hasSub)
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach($menu->subMenus->sortBy('order') as $sub)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item"
                                                    href="{{ url($sub->url) }}">{{ $sub->name }}</a>
                                                </li>
                                            @endforeach

                                            @if($menu->name == "Services")
                                                @foreach(services() as $service)
                                                    <li>
                                                        <a class="dropdown-item nav-link nav_item"
                                                        href="{{route('serviceDetail',$service->id)}}">{{ $service->title }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>

        </div>
    </header>
    <!-- END HEADER -->
