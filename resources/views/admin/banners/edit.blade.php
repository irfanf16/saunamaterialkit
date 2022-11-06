@extends('admin.layouts.master',['navItem'=>'banners'])
@section('title','Edit Banner')
@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                 data-bs-target="#kt_account_profile_details" aria-expanded="true"
                 aria-controls="kt_account_profile_details">
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
                <form id="kt_account_profile_details_form" method="POST" class="form" enctype="multipart/form-data"
                      action="{{route('banners.update',$banner->id)}}">
                    @csrf
                    @method('patch')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                     style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                         style="background-image: url({{asset('banners/Image/').'/'.$banner->image}})"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    {{--                                    <label--}}
                                    {{--                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
                                    {{--                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"--}}
                                    {{--                                        title="Change avatar">--}}
                                    {{--                                        <i class="bi bi-pencil-fill fs-7"></i>--}}
                                    {{--                                        <!--begin::Inputs-->--}}
                                    {{--                                        <input type="file" name="workshop_logo"/>--}}
                                    {{--                                        <input type="hidden" name="avatar_remove"/>--}}
                                    {{--                                        <!--end::Inputs-->--}}
                                    {{--                                    </label>--}}
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    {{--                                    <span--}}
                                    {{--                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
                                    {{--                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"--}}
                                    {{--                                        title="Cancel avatar">--}}
                                    {{--																	<i class="bi bi-x fs-2"></i>--}}
                                    {{--																</span>--}}
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    {{--                                    <span--}}
                                    {{--                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
                                    {{--                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"--}}
                                    {{--                                        title="Remove avatar">--}}
                                    {{--																	<i class="bi bi-x fs-2"></i>--}}
                                    {{--																</span>--}}
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                {{--                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Image</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" name="image" class="form-control form-control-lg form-control-solid" @error('image') style="border-color: red;" @enderror placeholder="Enter Workshop Name" value="{{old('workshop_name')}}" />
                                @error('image')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group--

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Title</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="title"
                                       class="form-control form-control-lg form-control-solid"
                                       @error('title') style="border-color: red;"
                                       @enderror placeholder="Enter title " value="{{$banner->title}}"/>
                                @error('title')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea type="text" name="description"
                                       class="form-control form-control-lg form-control-solid"
                                       @error('description') style="border-color: red;"
                                          @enderror placeholder="Enter Workshop Name">{{$banner->description}}</textarea>
                                @error('description')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        {{--                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>--}}
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                            Changes
                        </button>
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
