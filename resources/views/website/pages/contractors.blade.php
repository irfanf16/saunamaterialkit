@extends('website.layouts.app')
@section('content')


    <div id="banner-area" class="banner-area">
        <div class="container">
            <div class="page-title">
                <h1>Our Contractors</h1>
            </div>
        </div>
    </div>
    <main id="main-content">
        <section class="contractors-area">
            <div class="filter-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h1>Hire Our Contractors</h1>
                            <div class="hiring-selection">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Sconerio 1</option>
                                            <option value="1">Contractor 1</option>
                                            <option value="2">Contractor 2</option>
                                            <option value="3">Contractor 3</option>
                                            <option value="4">Contractor 4</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Sconerio 2</option>
                                            <option value="1">Contractor 1</option>
                                            <option value="2">Contractor 2</option>
                                            <option value="3">Contractor 3</option>
                                            <option value="4">Contractor 4</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Sconerio 3</option>
                                            <option value="1">Contractor 1</option>
                                            <option value="2">Contractor 2</option>
                                            <option value="3">Contractor 3</option>
                                            <option value="4">Contractor 4</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search A contractor">
                                            <div class="input-group-append">
                                                <button class="btn btn-sea"><i class="fal fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contractors-info">
                <div class="container">
                    @foreach($contractors as $contractor)
                    <div class="card contractor-card">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="contractor-img">
                                    <img src="{{asset('workshop/Image/').'/'.$contractor->logo}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 align-self-center">
                                <div class="contractor-content">
                                    <h3>{{$contractor->name}}</h3>
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
                                    <p>{{$contractor->address}}</p>
                                    <a href="#" class="btn btn-cont">
                                        Hire Contractor
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="next-page">--}}
{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination">--}}
{{--                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
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
