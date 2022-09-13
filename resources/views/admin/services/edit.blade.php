@extends('admin.layouts.master',['navItem'=>'services'])
@section('title','Create Services')
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
                <form id="kt_account_profile_details_form" method="POST" class="form" action="{{route('services.update',$service->id)}}">
                    @csrf
                    @method('patch')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Service Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name" @error('name') style="border-color: red;" @enderror class="form-control form-control-lg form-control-solid" placeholder="Enter Service Name" value="{{$service->name}}" />
                                @error('name')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

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
