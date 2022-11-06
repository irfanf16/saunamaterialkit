<!doctype html>
<html lang="en">
@include('website.layouts.head')
<body>
<div class="overlay"></div>

@include('website.layouts.header')

<main id="main-content">
    @include('sweetalert::alert')

    @yield('content')
    <section class="brands-area">
        <div class="container">
            <div class="brands-slider owl-carousel owl-theme">
                <div class="item">
                    <img src="{{asset('web/assets/img/b1.webp')}}" alt=""  class="img-fluid"/>
                </div>
                <div class="item">
                    <img src="{{asset('web/assets/img/b2.webp')}}" alt=""  class="img-fluid"/>
                </div>
                <div class="item">
                    <img src="{{asset('web/assets/img/b3.webp')}}" alt=""  class="img-fluid"/>
                </div>
                <div class="item">
                    <img src="{{asset('web/assets/img/b4.webp')}}" alt=""  class="img-fluid"/>
                </div>
                <div class="item">
                    <img src="{{asset('web/assets/img/b5.webp')}}" alt=""  class="img-fluid"/>
                </div>
                <div class="item">
                    <img src="{{asset('web/assets/img/b6.webp')}}" alt=""  class="img-fluid"/>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-5">
        <div class="container">
            <h4>SHARE THIS PAGE</h4>
            <ul class="nav social-nav justify-content-center">
                <li class="nav-item">
                    <a href="#" class="nav-link tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pin">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link in">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link mail">
                        <i class="fas fa-envelope"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</main>
@include('website.layouts.footer')

</body>
</html>
