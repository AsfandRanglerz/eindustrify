@extends('admin.master_layout')
@section('title')
    <title>{{ __('Update Customer') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Update Vendor') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.seller-list') }}">{{ __('Vendor List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Update Vendor') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.seller-list') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('Vendor List') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-vendor') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="form-group col-12">
                                            <label>{{ __('Category') }} <span class="text-danger">*</span></label>
                                            <select name="category_id[]" class="form-control selectric category" id="{{$data->id}}"
                                                multiple="">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <?php
                                                    $vendorCategory = App\Models\VendorCategory::where('category_id', $category->id)
                                                        ->where('vendor_id', $data->id)
                                                        ->first();
                                                    ?>
                                                    <option value="{{ $category->id }}"
                                                        @if (isset($vendorCategory)) @if ($category->id == $vendorCategory->category_id) selected @endif
                                                        @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Subcategory') }} <span class="text-danger">*</span></label>
                                            <select name="subcategory_id[]" class="form-control selectric subcategory" id="{{$data->id}}"
                                                multiple="">
                                                <option value="" disabled selected>Select Subcategory</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <?php
                                                    $vendorCategory = App\Models\VendorCategory::where('category_id', $subcategory->category_id)
                                                        ->where('vendor_id', $data->id)
                                                        ->first();
                                                    if (isset($vendorCategory)) {
                                                        $vendorSubCategory = App\Models\VendorSubCategory::where('sub_category_id', $subcategory->id)
                                                            ->where('category_id', $vendorCategory->category_id)
                                                            ->where('vendor_id', $data->id)
                                                            ->first();
                                                    }
                                                    ?>
                                                    <option value="{{ $subcategory->id }}"
                                                        @if (isset($vendorSubCategory)) @if ($subcategory->id == $vendorSubCategory->sub_category_id) selected @endif
                                                        @endif>{{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Child Category') }} <span class="text-danger">*</span></label>
                                            <select name="childcategory_id[]" class="form-control selectric"
                                                id="childcategory" multiple="">
                                                <option value="" disabled selected>Select Childcategory</option>
                                                @foreach ($childcategories as $childcategory)
                                                    <?php
                                                    $vendorCategory = App\Models\VendorCategory::where('category_id', $childcategory->category_id)
                                                        ->where('vendor_id', $data->id)
                                                        ->first();
                                                    if (isset($vendorCategory)) {
                                                        $vendorSubCategory = App\Models\VendorSubCategory::where('sub_category_id', $childcategory->sub_category_id)
                                                            ->where('category_id', $vendorCategory->category_id)
                                                            ->where('vendor_id', $data->id)
                                                            ->first();
                                                    }
                                                    if (isset($vendorSubCategory)) {
                                                        $vendorChildCategory = App\Models\VendorChildCategory::where('sub_category_id', $childcategory->sub_category_id)
                                                            ->where('category_id', $vendorSubCategory->category_id)
                                                            ->where('child_category_id', $childcategory->    id)
                                                            ->where('vendor_id', $data->id)
                                                            ->first();
                                                    }
                                                    ?>

                                                    <option value="{{ $childcategory->id }}" @if (isset($vendorChildCategory)) @if ($childcategory->id == $vendorChildCategory->child_category_id) selected @endif
                                                        @endif>{{ $childcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="First Name" value="{{ $data->first_name }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="last_name"
                                                placeholder="Last Name" value="{{ $data->last_name }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                placeholder="Example@gmail.com" value="{{ $data->email }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                            <input type="tel" id="email" class="form-control" name="phone"
                                                placeholder="92xxxxxxxxxx" value="{{ $data->phone }}">
                                        </div>
                                        <h4>Business Information</h4>
                                        <div class="form-group col-12">
                                            <label>{{ __('Business Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bussiness_name"
                                                value="{{ $data->businessInformation->name }}" placeholder="XYZ Bussiness">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('TAX ID') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $data->businessInformation->tax_id }}" name="bussiness_tax_id"
                                                placeholder="ATU12345678">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Industry Type') }} <span class="text-danger">*</span></label>
                                            <select name="bussiness_industry_type" class="form-control" id="">
                                                <option value="1">Select Industry</option>
                                                <option value="1" @if ($data->businessInformation->industry_type == '1') selected @endif>
                                                    Industry One</option>
                                                <option value="2" @if ($data->businessInformation->industry_type == '2') selected @endif>
                                                    Industry Two</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('VAT') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bussiness_vat"
                                                value="{{ $data->businessInformation->vat }}"
                                                placeholder="Enter Vat Number">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('No Of Employees') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="total_employee"
                                                value="{{ $data->businessInformation->total_employee }}"
                                                placeholder="Number Of Employees">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Business Number') }} <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" name="bussiness_phone"
                                                value="{{ $data->businessInformation->phone }}"
                                                placeholder="Business Number">
                                        </div>
                                        <h4>Billing Address</h4>
                                        <div class="form-group col-12">
                                            <label>{{ __('Street Address Line 1') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $data->billingAddress->street_address }}"
                                                name="billing_street_address" placeholder="Street, 6001 W Waco Dr #314">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Suite, Building, Department etc') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $data->billingAddress->department }}" name="billing_department"
                                                placeholder="Suite, building, department etc">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Country/Region') }} <span class="text-danger">*</span></label>
                                            <select name="billing_country_id" class="form-control"
                                                id="billing_country_id">
                                                <option value="1">Select Country</option>
                                                @foreach ($country as $country_data)
                                                    <option value="{{ $country_data->id }}"
                                                        @if ($data->billingAddress->country->id == $country_data->id) selected @endif>
                                                        {{ $country_data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('State') }} <span class="text-danger">*</span></label>
                                            <select name="billing_state_id" class="form-control"
                                                id="response_billing_state_append">
                                                <option value="">Select State</option>
                                                @foreach ($billingState as $state_data)
                                                    <option value="{{ $state_data->id }}"
                                                        @if ($data->billingAddress->countryState->id == $state_data->id) selected @endif>
                                                        {{ $state_data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('City') }} <span class="text-danger">*</span></label>
                                            <select name="billing_city_id" class="form-control"
                                                id="response_billing_city_append">
                                                <option value="1">Select City</option>
                                                @foreach ($billingCity as $city_data)
                                                    <option value="{{ $city_data->id }}"
                                                        @if ($data->billingAddress->city->id == $city_data->id) selected @endif>
                                                        {{ $city_data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Postal/Zip Code') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $data->billingAddress->zip_code }}" name="billing_zip_code"
                                                placeholder="147001">
                                        </div>
                                        {{-- <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1">{{__('admin.Active')}}</option>
                                        <option value="0">{{__('admin.InActive')}}</option>
                                    </select>
                                </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary">{{ __('admin.Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#name").on("focusout", function(e) {
                    $("#slug").val(convertToSlug($(this).val()));
                })
            });
        })(jQuery);

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function() {
              $("#category").change(function() {
                  var selectedText = $(this).find("option:selected").text();
                  var categoryId = $(this).val();
                  // alert(categoryId);
                  $.ajax({
                      url: '{{ URL::to('/admin/store-session') }}',
                      type: 'GET',
                      data: {
                          'id': categoryId
                      },
                      success: function(response) {
                          // alert('session response ' + response.category);
                          // $('#subcategoryData').empty();
                          // $('#subcategoryData').append(response).selectric();
                      },
                      error: function(xhr) {
                          // Handle error here
                          console.log(xhr.responseText);
                      }
                  });
              });
          });
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
              $(".category").change(function() {
                  var selectedText = $(this).find("option:selected").text();
                  var categoryId = $(this).val();
                  var vendor_id = $(this).attr('id');
                  $.ajax({
                      url: '{{ URL::to('/admin/get-subcategory') }}',
                      type: 'GET',
                      data: {
                          'id': categoryId,
                          'vendor_id': vendor_id
                      },
                      success: function(response) {
                          $('.subcategory').empty();
                          $('.subcategory').append(response).selectric();
                      },
                      error: function(xhr) {
                          // Handle error here
                          console.log(xhr.responseText);
                      }
                  });
              });
          });
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
              $(".subcategory").change(function() {
                  var selectedText = $(this).find("option:selected").text();
                  var subCategoryId = $(this).val();
                  var vendor_id = $(this).attr('id');
                  $.ajax({
                      url: '{{ URL::to('/admin/subcategory-store-session') }}',
                      type: 'GET',
                      data: {
                          'id': subCategoryId,
                          'vendor_id': vendor_id
                      },
                      success: function(response) {
                          // alert('sub category session response ' + response.subcategory);
                          // $('#subcategoryData').empty();
                          // $('#subcategoryData').append(response).selectric();
                      },
                      error: function(xhr) {
                          // Handle error here
                          console.log(xhr.responseText);
                      }
                  });
              });
          });
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
              $("#subcategory").change(function() {
                  var selectedText = $(this).find("option:selected").text();
                  var subcategoryId = $(this).val();
                  $.ajax({
                      url: '{{ URL::to('/admin/get-childcategory') }}',
                      type: 'GET',
                      data: {
                          'id': subcategoryId
                      },
                      success: function(response) {
                          $('#childcategory').empty();
                          $('#childcategory').append(response).selectric();
                      },
                      error: function(xhr) {
                          // Handle error here
                          console.log(xhr.responseText);
                      }
                  });
              });
          });
      </script>
@endsection
