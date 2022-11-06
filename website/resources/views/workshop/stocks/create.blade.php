@extends('admin.layouts.master',['navItem'=>'stocks'])
@section('title','Assign Product To Workshop')
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
                <form id="kt_account_profile_details_form" method="POST" class="form" action="{{route('stocks.store')}}">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Select Workshop</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="workshop_id" aria-label="Select a Locations" data-control="select2" @error('workshop_id') style="border-color: red;" @enderror data-placeholder="Select a Location..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    @foreach($workshops as $workshop)
                                    <option  value="{{$workshop->id}}">{{$workshop->name}}</option>
                                    @endforeach
                                </select>
                                @error('workshop_id')
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
                                <span class="required">Select Product</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="product_variant_id" aria-label="Select a Locations" data-control="select2" @error('workshop_id') style="border-color: red;" @enderror data-placeholder="Select a Location..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    @foreach($productVariants as $productVariant)
                                        <option  value="{{$productVariant->id}}">Product: {{$productVariant->product->name}} <h3>Variant:</h3> {{$productVariant->size}} </option>
                                    @endforeach
                                </select>
                                @error('product_variant_id')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--                            <!--end::Col-->--}}
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Add Stock</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="stocks" class="form-control form-control-lg form-control-solid" @error('stocks') style="border-color: red;" @enderror placeholder="Enter stocks" value="{{old('stocks')}}" />
                                @error('stocks')
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
