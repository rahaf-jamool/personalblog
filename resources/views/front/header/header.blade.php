<div class="container-fluid d-flex justify-content-between align-items-center">
    <h1 class="logo me-auto me-lg-0"><a href="{{route('home.index')}}">{{__('front.personalBlog')}}</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="active" href="{{route('home.index')}}">{{__('front.home')}}</a></li>
            <li><a href="{{route('home.about')}}">{{__('front.about')}}</a></li>
            <li><a href="{{route('home.blog')}}">{{__('front.blogs')}}</a></li>
            <li><a href="{{route('home.service')}}">{{__('front.services')}}</a></li>
            <li><a href="{{route('home.mychannel')}}">My Channnel</a></li>
            <li><a href="{{route('home.contact')}}">{{__('front.contact')}}</a></li>
            {{-- dropdown language --}}
            <li class="dropdown m-4">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button">{{__('front.languages')}}</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="text-decoration-none" href="{{route('frontend_change_locale','en')}}">{{__('front.english')}}</a>
                  </li>
                  <li>
                    <a class="text-decoration-none" href="{{route('frontend_change_locale','ar')}}">{{__('front.arabic')}}</a>
                  </li>
                </ul>
            </li>
        </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
</div>