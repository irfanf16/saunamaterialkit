@extends('admin.layouts.master',['navItem'=>'locations'])
@section('title','Create Location')
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
                <form id="kt_account_profile_details_form" method="POST" class="form"
                      action="{{route('locations.store')}}">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Location Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid "
                                       @error('name') style="border-color: red;" @enderror placeholder="Enter Location Name" value=""/>
                                @error('name')
                                <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6 mt-5">Cities</label>

                            <div class="col-lg-8 fv-row mt-5">
                                <div class="table-listing">
                                    <div class="row">
                                        <div class="col-md-12 p-0">
                                            <div class="dynamic-table">
                                                <table id="add_sku"
                                                       class="table table-hover fixed-table render-table"
                                                       cellspacing="0" width="100%">
                                                    <thead class="render-header">
                                                    <tr>
                                                        <th>City Name</th>
                                                        <th>Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="render-body">
                                                    <tr>

                                                        <td>
                                                            <input type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   name="city_name[]" id="" min="0"
                                                                   placeholder="Please Enter city name" required>
                                                        </td>


                                                        <td>
                                                            <button class="btn-sm form-control form-control-lg form-control-solid   delete-action delete-row-table">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-row">
                                        <a href="javascript:void(0);"
                                           class="btn btn-sm btn-primary add-new-row-table">Add New City</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>


        $('.add-new-row-table').click(function () {
            var table = $('body').find('.render-table');
            var body = table.find('.render-body');
            var firstrow = body.find('tr').first().html();
            body.append(`
            <tr>
                ${firstrow}
            </tr>
        `);
        })
        $('body').on('click', '.delete-row-table', function () {
            // alert('delete');
            // $(this).css('background-color', 'red');
            var count = $('.render-body').find('tr').length;
            console.log(count);
            if (count > 1) {
                $(this).parents('tr').remove();
            }
        });

    </script>
@endsection
