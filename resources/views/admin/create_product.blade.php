@extends('admin.master_layout')
@section('title')
    <title>{{ __('admin.Products') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('admin.Create Product') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('admin.Create Product') }}</div>
                </div>
            </div>
            <div class="section-body">
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('admin.Products') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Thumbnail Image Preview') }}</label>
                                            <div>
                                                <img id="preview-img" class="admin-img"
                                                    src="{{ asset('uploads/website-images/preview.png') }}" alt="">
                                            </div>

                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Thumnail Image') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control-file" name="thumb_image"
                                                onchange="previewThumnailImage(event)">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Banner Image') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control-file" name="banner_image">
                                        </div>


                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Short Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="short_name" class="form-control" name="short_name"
                                                value="{{ old('short_name') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Slug') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="slug" class="form-control" name="slug"
                                                value="{{ old('slug') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Category') }} <span class="text-danger">*</span></label>
                                            <select name="category" class="form-control select2" id="category">
                                                <option value="">{{ __('admin.Select Category') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Sub Category') }}</label>
                                            <select name="sub_category" class="form-control select2" id="sub_category">
                                                <option value="">{{ __('admin.Select Sub Category') }}</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Child Category') }}</label>
                                            <select name="child_category" class="form-control select2" id="child_category">
                                                <option value="">{{ __('admin.Select Child Category') }}</option>
                                                @foreach ($childcategories as $childcategory)
                                                    <option value="{{ $childcategory->id }}">{{ $childcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Brand') }} <span class="text-danger">*</span></label>
                                            <select name="brand" class="form-control select2" id="brand">
                                                <option value="">{{ __('admin.Select Brand') }}</option>
                                                @foreach ($brands as $brand)
                                                    <option {{ old('brand') == $brand->id ? 'selected' : '' }}
                                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.SKU') }} </label>
                                            <input type="text" class="form-control" name="sku">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Size (Power etc)') }} </label>
                                            <input type="text" class="form-control" name="size">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Price') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="price"
                                                value="{{ old('price') }}">
                                        </div>

                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.Offer Price') }}</label>
                                            <input type="text" class="form-control" name="offer_price"
                                                value="{{ old('offer_price') }}">
                                        </div> --}}



                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Stock Quantity') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="quantity"
                                                value="{{ old('quantity') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Video Link') }}</label>
                                            <input type="text" class="form-control" name="video_link"
                                                value="{{ old('video_link') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Short Description') }} <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="short_description" id="" cols="30" rows="10" class="form-control text-area-5">{{ old('short_description') }}</textarea>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Long Description') }} <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="long_description" id="" cols="30" rows="10" class="summernote">{{ old('long_description') }}</textarea>
                                        </div>




                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.Tags') }}</label>
                                            <input type="text" class="form-control tags" name="tags"
                                                value="{{ old('tags') }}">
                                        </div> --}}

                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.Tax') }} <span class="text-danger">*</span></label>
                                            <select name="tax" class="form-control">
                                                <option value="">{{ __('admin.Select Tax') }}</option>
                                                @foreach ($productTaxs as $tax)
                                                    <option {{ old('tax') == $tax->id ? 'selected' : '' }}
                                                        value="{{ $tax->id }}">{{ $tax->title }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}

                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.Product Return Availabe ?') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="is_return" class="form-control" id="is_return">
                                                <option value="0">{{ __('admin.No') }}</option>
                                                <option value="1">{{ __('admin.Yes') }}</option>
                                            </select>
                                        </div> --}}

                                        {{-- <div class="form-group col-12 d-none" id="policy_box">
                                            <label>{{ __('admin.Return Policy') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="return_policy_id" class="form-control">
                                                @foreach ($retrunPolicies as $retrunPolicy)
                                                    <option value="{{ $retrunPolicy->id }}">{{ $retrunPolicy->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> --}}


                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.Warranty Available ?') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="is_warranty" class="form-control">
                                                <option value="1">{{ __('admin.Yes') }}</option>
                                                <option value="0">{{ __('admin.No') }}</option>
                                            </select>
                                        </div> --}}



                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Status') }} <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control">
                                                <option value="1">{{ __('admin.Active') }}</option>
                                                <option value="0">{{ __('admin.Inactive') }}</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-12">
                                            <label>{{ __('admin.SEO Title') }}</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                value="{{ old('seo_title') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.SEO Description') }}</label>
                                            <textarea name="seo_description" id="" cols="30" rows="10" class="form-control text-area-5">{{ old('seo_description') }}</textarea>
                                        </div> --}}
                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Specifications') }}</label>
                                            <div>
                                                <a href="javascript::void()" id="manageSpecificationBox">
                                                    <input name="is_specification" id="status_toggle" type="checkbox"
                                                        checked data-toggle="toggle" data-on="Enable" data-off="Disabled"
                                                        data-onstyle="success" data-offstyle="danger">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 specification-box" id="specBox">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>{{ __('admin.Key') }} <span
                                                            class="text-danger">*</span></label>
                                                    <select name="keys[]" class="form-control">
                                                        @foreach ($specificationKeys as $specificationKey)
                                                            <option value="{{ $specificationKey->id }}">
                                                                {{ $specificationKey->key }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>{{ __('admin.Specification') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="specifications[]">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button"
                                                        class="btn btn-success plus_btn addNewSpecificationRow"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="d-none hidden-specification-box">
                                                <div class="delete-specification-row">
                                                    <div class="row mt-2">
                                                        <div class="col-md-5">
                                                            <label>{{ __('admin.Key') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="keys[]" class="form-control">
                                                                @foreach ($specificationKeys as $specificationKey)
                                                                    <option value="{{ $specificationKey->id }}">
                                                                        {{ $specificationKey->key }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>{{ __('admin.Specification') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="specifications[]">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button"
                                                                class="btn btn-danger plus_btn deleteSpeceficationBtn"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Product Overview') }}</label>
                                            {{-- <div>
                                                <a href="javascript::void()" id="manageSpecificationBox">
                                                    <input name="is_specification" id="status_toggle" type="checkbox"
                                                        checked data-toggle="toggle" data-on="Enable" data-off="Disabled"
                                                        data-onstyle="success" data-offstyle="danger">
                                                </a>
                                            </div> --}}
                                        </div>
                                        <div class="form-group col-12 specification-box">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>{{ __('admin.Title') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="product_overview_title[]">
                                                </div>
                                                <div class="col-md-5">
                                                    <label>{{ __('admin.Image') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control"
                                                        name="product_overview_image[]">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button"
                                                        class="btn btn-success plus_btn addNewSpecificationRow"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="d-none hidden-specification-box">
                                                <div class="delete-specification-row">
                                                    <div class="row mt-2">
                                                        <div class="col-md-5">
                                                            <label>{{ __('admin.Title') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="product_overview_title[]">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>{{ __('admin.Image') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="file" class="form-control"
                                                                name="product_overview_image[]">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button"
                                                                class="btn btn-danger plus_btn deleteSpeceficationBtn"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Product Variant') }}</label>
                                            <div>
                                                <a href="javascript::void()" id="manageSpecificationBox">
                                                    <input name="is_specification" id="status_toggle" type="checkbox"
                                                        checked data-toggle="toggle" data-on="Enable" data-off="Disabled"
                                                        data-onstyle="success" data-offstyle="danger">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 specification-box">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>{{ __('Variant') }} <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="product_size[]">
                                                </div>
                                                <div class="col-md-5">
                                                    <label>{{ __('admin.Price') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="product_price[]">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>{{ __('Discount Price') }} <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="discount_price[]">
                                                </div>
                                                <div class="col-md-5">
                                                    <label>{{ __('SKU') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="product_sku[]">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <label>{{ __('Quantity') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="product_qty[]">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button"
                                                        class="btn btn-success plus_btn addNewSpecificationRow"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="d-none hidden-specification-box">
                                                <div class="delete-specification-row">
                                                    <div class="row mt-2">
                                                        <div class="col-md-5">
                                                            <label>{{ __('Variant') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="product_size[]">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>{{ __('admin.Price') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="product_price[]">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label>{{ __('Discount Price') }} <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="discount_price[]">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>{{ __('SKU') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="product_sku[]">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label>{{ __('Quantity') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="product_qty[]">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button"
                                                                class="btn btn-danger plus_btn deleteSpeceficationBtn"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            var specification = true;
            $(document).ready(function() {
                $("#name").on("focusout", function(e) {
                    $("#slug").val(convertToSlug($(this).val()));
                })

                $("#category").on("change", function() {
                    var categoryId = $("#category").val();
                    if (categoryId) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('/admin/subcategory-by-category/') }}" + "/" +
                                categoryId,
                            success: function(response) {
                                $("#sub_category").html(response.subCategories);
                                var response =
                                    "<option value=''>{{ __('admin.Select Child Category') }}</option>";
                                $("#child_category").html(response);
                            },
                            error: function(err) {
                                console.log(err);

                            }
                        })
                    } else {
                        var response =
                            "<option value=''>{{ __('admin.Select Sub Category') }}</option>";
                        $("#sub_category").html(response);
                        var response =
                            "<option value=''>{{ __('admin.Select Child Category') }}</option>";
                        $("#child_category").html(response);
                    }


                })

                $("#sub_category").on("change", function() {
                    var SubCategoryId = $("#sub_category").val();
                    if (SubCategoryId) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('/admin/childcategory-by-subcategory/') }}" + "/" +
                                SubCategoryId,
                            success: function(response) {
                                $("#child_category").html(response.childCategories);
                            },
                            error: function(err) {
                                console.log(err);

                            }
                        })
                    } else {
                        var response =
                            "<option value=''>{{ __('admin.Select Child Category') }}</option>";
                        $("#child_category").html(response);
                    }

                })

                $("#is_return").on('change', function() {
                    var returnId = $("#is_return").val();
                    if (returnId == 1) {
                        $("#policy_box").removeClass('d-none');
                    } else {
                        $("#policy_box").addClass('d-none');
                    }
                });

                $(".addNewSpecificationRow").on('click', function() {
                    var html = $(this).closest(".specification-box").find(".hidden-specification-box")
                        .html();
                    $(this).closest(".specification-box").append(html);
                });

                $(document).on('click', '.deleteSpeceficationBtn', function() {
                    $(this).closest('.delete-specification-row').remove();
                });


                $("#manageSpecificationBox").on("click", function() {
                    if (specification) {
                        specification = false;
                        $("#specBox").addClass('d-none');
                    } else {
                        specification = true;
                        $("#specBox").removeClass('d-none');
                    }
                });

            });
        })(jQuery);

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }

        function previewThumnailImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-img');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        };



        // child_category
        $(document).ready(function() {
            $("#child_category").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var childcategoryId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/admin/get-childCategory') }}',
                    type: 'GET',
                    data: {
                        'id': childcategoryId
                    },
                    success: function(response) {
                        $("#category option").each(function() {
                            if($(this).val()==response.childcategory.category_id){
                                var childCatVal = $(this).val();
                                var catVal = $('#category option[value="' + childCatVal + '"]').text();
                                $('#select2-category-container').text(catVal);
                            }
                        });
                        $("#sub_category option").each(function() {
                            if($(this).val()==response.childcategory.sub_category_id){
                                var childCatVal = $(this).val();
                                var subCatVal = $('#sub_category option[value="' + childCatVal + '"]').text();
                                $('#select2-sub_category-container').text(subCatVal);
                            }
                        });
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
