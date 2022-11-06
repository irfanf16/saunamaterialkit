@extends('admin.layouts.master',['navItem'=>'workshop'])
@section('title','Create Contractor')
@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
{{--                    <h3 class="fw-bold m-0">Profile Details</h3>--}}
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" method="POST" class="form" action="{{route('workshop.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
{{--                        <div class="row mb-6">--}}
{{--                            <!--begin::Label-->--}}
{{--                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>--}}
{{--                            <!--end::Label-->--}}
{{--                            <!--begin::Col-->--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <!--begin::Image input-->--}}
{{--                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">--}}
{{--                                    <!--begin::Preview existing avatar-->--}}
{{--                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>--}}
{{--                                    <!--end::Preview existing avatar-->--}}
{{--                                    <!--begin::Label-->--}}
{{--                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">--}}
{{--                                        <i class="bi bi-pencil-fill fs-7"></i>--}}
{{--                                        <!--begin::Inputs-->--}}
{{--                                        <input type="file" name="workshop_logo"  />--}}
{{--                                        <input type="hidden" name="avatar_remove" />--}}
{{--                                        <!--end::Inputs-->--}}
{{--                                    </label>--}}
{{--                                    <!--end::Label-->--}}
{{--                                    <!--begin::Cancel-->--}}
{{--                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">--}}
{{--																	<i class="bi bi-x fs-2"></i>--}}
{{--																</span>--}}
{{--                                    <!--end::Cancel-->--}}
{{--                                    <!--begin::Remove-->--}}
{{--                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">--}}
{{--																	<i class="bi bi-x fs-2"></i>--}}
{{--																</span>--}}
{{--                                    <!--end::Remove-->--}}
{{--                                </div>--}}
{{--                                <!--end::Image input-->--}}
{{--                                <!--begin::Hint-->--}}
{{--                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
{{--                                <!--end::Hint-->--}}
{{--                            </div>--}}
{{--                            <!--end::Col-->--}}
{{--                        </div>--}}
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Workshop logo</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" name="workshop_logo" class="form-control form-control-lg form-control-solid" @error('workshop_logo') style="border-color: red;" @enderror placeholder="Enter Workshop Name" value="{{old('workshop_name')}}" />
                                @error('workshop_logo')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group--
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">User Info</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter name" @error('name') style="border-color: red;" @enderror value="{{old('name')}}" />
                                        @error('name')
                                        <div class="alert ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="email" name="email" class="form-control form-control-lg form-control-solid" @error('email') style="border-color: red;" @enderror placeholder="Enter Email" value="" />
                                        @error('email')
                                        <div class="alert ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Workshop</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="workshop_name" class="form-control form-control-lg form-control-solid" @error('workshop_name') style="border-color: red;" @enderror placeholder="Enter Workshop Name" value="{{old('workshop_name')}}" />
                                @error('workshop_name')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Workshop Contact Phone</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="contact_person" class="form-control form-control-lg form-control-solid" @error('contact_person') style="border-color: red;" @enderror placeholder="Phone number" value="{{old('contact_person')}} " />
                                @error('contact_person')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Phone No</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>

                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="phone_no" class="form-control form-control-lg form-control-solid" @error('phone_no') style="border-color: red;" @enderror placeholder="Phone number" value=" {{old('phone_no')}}" />
                                @error('phone_no')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Workshop Address</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="workshop_address" class="form-control form-control-lg form-control-solid"  @error('workshop_address') style="border-color: red;" @enderror placeholder="Workshop Address" value="{{old('workshop_address')}}" />
                                @error('workshop_address')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Workshop Zipcode</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="zipcode" class="form-control form-control-lg form-control-solid"  @error('zipcode') style="border-color: red;" @enderror placeholder="Workshop zipcode" value="{{old('zipcode')}}" />
                                @error('zipcode')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Workshop Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="password" class="form-control form-control-lg form-control-solid" @error('password') style="border-color: red;" @enderror placeholder="Workshop Password" value="{{old('password')}}" />
                                @error('password')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Locations</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="locations" aria-label="Select a Locations" data-control="select2" @error('locations') style="border-color: red;" @enderror data-placeholder="Select a Location..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    @foreach($locations as $location)
                                    <option  value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                                @error('locations')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <!--end::Col-->--}}
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Services</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="List of services"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select multiple name="services" aria-label="Select a Services" data-control="select2" @error('services') style="border-color: red;" @enderror data-placeholder="Select a Services..." class="form-select form-select-solid form-select-lg fw-semibold">

                                    @foreach($services as $service)
                                        <option  value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                                @error('services')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--                            <!--end::Col-->--}}
                        </div>

                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
{{--                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>--}}
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
@endsection
