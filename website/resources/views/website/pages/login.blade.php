@extends('website.layouts.app')
@section('content')

    <div id="banner-area" class="banner-area">
        <div class="container">
            <div class="page-title">
                <h1>Login</h1>
            </div>
        </div>
    </div>

    <section class="contractor-form-area">
        <div class="container">
            <div class="form-area">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="form-box">
                            <h1>If you want to login fill this form!</h1>
                            <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    @if(\Illuminate\Support\Facades\Session::has('errorMessages'))
                                        @foreach(\Illuminate\Support\Facades\Session::get('errorMessages') as $error)
                                            <div class="alert alert-danger ">{{ $error }}</div>
                                        @endforeach
                                    @endif

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label class="form-label">Your Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                        @error('email')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" value="{{old('password')}}"
                                               class="form-control">
                                        @error('password')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <button class="btn btn-submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
