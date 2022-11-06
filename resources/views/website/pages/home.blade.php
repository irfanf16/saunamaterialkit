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
            <div class="item">
                <div class="banner-img">
                    <img src="https://via.placeholder.com/1920x750" class="img-fluid d-block mx-auto w-100">
                </div>
                <div class="text-area">
                    <div class="container">
                        <h1>Heading 1</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into
                            electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main id="main-content">
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
        </section>
        <!--            <section class="sec-1">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <h1>
                                        At AIRCONCHAMP we believe that everybody deserves a health friendly and professional CAR AC Service.
                                    </h1>
                                    <p>GET THE ONLY CLEANING SERVICE WITH A FREE HYGIENE ANALYSIS (BEFORE – AFTER)</p>
                                    <a href="#" class="btn btn-main">
                                        Service Locator
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>-->



        <!--            <section class="sec-4">
                        <div class="container">
                            <div class="card-box">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <h4>Discovering Rolex</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card zoom-card">
                                                    <img src="assets/img/lom.jpg" alt="" class="img-fluid"/>
                                                    <div class="card-body">
                                                        <h3>Rolex and Waterproofness</h3>
                                      </div>
                    </div>
                </div>
            </div>
        </section>
        <!--            <section class="sec-4">
                        <div class="container">
                            <div class="card-box">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <h4>Discovering Rolex</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card zoom-card">
                                                    <img src="assets/img/lom.jpg" alt="" class="img-fluid"/>
                                                   <p>Mastering Waterproofness</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card zoom-card">
                                                    <img src="assets/img/op.jpg" alt="" class="img-fluid"/>
                                                    <div class="card-body">
                                                        <h3>Rolex and Waterproofness</h3>
                                                        <p>Mastering Waterproofness</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card zoom-card">
                                                    <img src="assets/img/hp.webp" alt="" class="img-fluid"/>
                                                    <div class="card-body">
                                                        <h3>Rolex and Waterproofness</h3>
                                                        <p>Mastering Waterproofness</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>-->
        <section class="reviews-area">
            <div class="container">
                <h1><span>EXCELLENT</span> CUSTOMER FEEDBACK</h1>
                <div class="reviews-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card review-card">
                                <div class="review-img">
                                    <img src="assets/img/p1.webp" class="img-fluid">
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
                                    <img src="assets/img/p2.webp" class="img-fluid">
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
                                    <img src="assets/img/p3.webp" class="img-fluid">
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
        <section class="brands-area">
            <div class="container">
                <div class="brands-slider owl-carousel owl-theme">
                    <div class="item">
                        <img src="assets/img/b1.webp" alt=""  class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="assets/img/b2.webp" alt=""  class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="assets/img/b3.webp" alt=""  class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="assets/img/b4.webp" alt=""  class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="assets/img/b5.webp" alt=""  class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="assets/img/b6.webp" alt=""  class="img-fluid"/>
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
@endsection
