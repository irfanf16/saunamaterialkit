@extends('website.layouts.app')
@section('content')

    <div id="banner-area" class="banner-area">
        <div class="container">
            <div class="page-title">
                <h1>Become A Contractor</h1>
            </div>
        </div>
    </div>

    <section class="contractor-form-area">
        <div class="container">
            <div class="form-area">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="form-box">
                            <h1>If you want to Become A Contractor fill this form!</h1>
                            <form action="{{route('become.contractor')}}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    @if(\Illuminate\Support\Facades\Session::has('errorMessages'))
                                        @foreach(\Illuminate\Support\Facades\Session::get('errorMessages') as $error)
                                            <div class="alert alert-danger ">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Your Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                        @error('email')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" value="{{old('password')}}"
                                               class="form-control">
                                        @error('password')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop Name</label>
                                        <input type="text" name="workshop_name" value="{{old('workshop_name')}}"
                                               class="form-control">
                                        @error('workshop_name')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop Contact PHone</label>
                                        <input type="number" name="contact_person" value="{{old('contact_person')}}"
                                               class="form-control">
                                        @error('contact_person')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop No</label>
                                        <input type="number" name="phone_no" value="{{old('phone_no')}}"
                                               class="form-control">
                                        @error('phone_no')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop Address</label>
                                        <input type="text" name="workshop_address" value="{{old('workshop_address')}}"
                                               class="form-control">
                                        @error('workshop_address')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop Zipcode</label>
                                        <input type="number" name="zipcode" value="{{old('zipcode')}}"
                                               class="form-control">
                                        @error('zipcode')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label">Shop Picture</label>
                                        <input type="file" name="workshop_logo" class="form-control">
                                        @error('workshop_logo')
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
