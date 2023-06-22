@extends('admin.master_layout')
@section('title')
    <title>{{ __('Product Sizes') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Update Product Size') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.product-size', $data->product_id) }}">{{ __('Product Size') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Product Size') }}</div>
                </div>
            </div>
            <div class="section-body">
                <a href="{{ route('admin.product-size', $data->product_id) }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('prduct-size') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-product-size') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <div class="form-group col-12">
                                            <label>{{ __('Product Size') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="product_size"
                                                value="{{ $data->product_size }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Product Price') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="product_price"
                                                value="{{ $data->product_price }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Discount Price') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="discount_price"
                                                value="{{ $data->discount_price }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('SKU') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="sku"
                                                value="{{ $data->sku }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Quantity') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="qty"
                                                value="{{ $data->qty }}">
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

    {{-- ck ediotr --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
