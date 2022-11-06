@extends('website.layouts.app')
@section('content')

        <div id="search-bar">
            <div class="container">
                <div class="search-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">

                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="site-logo">
                                <a href="#">
                                    <img src="https://via.placeholder.com/412x199" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <button class="btn btn-clo"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="search-content">
                    <h1>SEARCH THE ROLEX WEBSITE</h1>
                    <div class="search-form">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-submit" type="submit"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="banner-area">
            <div class="overlay_1"></div>
            <div class="banner-slider owl-carousel owl-theme">
                @foreach($banners as $banner)
                    <div class="item">
                        <div class="banner-img">
                            <img src="{{config('app.url') .'/banners/Image'.'/'.$banner['image']}}" class="img-fluid d-block mx-auto w-100">
                        </div>
                        <div class="text-area">
                            <div class="container">
                                <h1>{{$banner['title']}}</h1>
                                <p>{{$banner['description']}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <section class="search-area">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Find material kit near you.
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Find material + Contractor near you.</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="search-form">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-submit" type="submit"><i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{route('contractors')}}" method="Get">


                        <div class="search-form">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-submit" type="submit"><i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews-area">
            <div class="container">
                <h1><span>EXCELLENT</span> CUSTOMER FEEDBACK</h1>
                <div class="reviews-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card review-card">
                                <div class="review-img">
                                    <img src="{{asset('web/assets/img/p1.webp')}}" class="img-fluid">
                                </div>
                                <div class="review-rating">
                                    <ul class="nav rating-nav">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review-content">
                                    <p>
                                        "This goes directly to the cooling coil and cleans it up. This one is the Real Deal!"
                                    </p>
                                    <h4>DEREK K.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card review-card">
                                <div class="review-img">
                                    <img src="{{asset('web/')}}assets/img/p2.webp" class="img-fluid">
                                </div>
                                <div class="review-rating">
                                    <ul class="nav rating-nav">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review-content">
                                    <p>
                                        "Bacteria is an important topic. It's a very good Feeling after the Cleaning. This is a really good product"
                                    </p>
                                    <h4>SUNIL S.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card review-card">
                                <div class="review-img">
                                    <img src="{{asset('web/assets/img/p3.webp')}}" class="img-fluid">
                                </div>
                                <div class="review-rating">
                                    <ul class="nav rating-nav">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review-content">
                                    <p>
                                        "It goes directly to the Cooling Coil and kills the Bacteria. Whereby other products just give a nice smell."
                                    </p>
                                    <h4>TOBIAS R.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
