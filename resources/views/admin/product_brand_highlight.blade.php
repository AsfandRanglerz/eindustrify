@extends('admin.master_layout')
@section('title')
<title>{{__('Product Brand Highlight')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Brands Highlight')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Product Brand Highlight')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.product-brand.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Brands')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-product-brand-highlight',$brand->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Select Type')}} <span class="text-danger">*</span></label>
                                    <select name="product_type" class="form-control" id="product_type">
                                        {{-- <option {{ $brand->is_undefine == 1 ? 'selected' : '' }} value="1">{{__('Undefine Brand')}}</option> --}}
                                        {{-- <option {{ $product->new_product == 1 ? 'selected' : '' }} value="2">{{__('admin.New Arrival')}}</option> --}}
                                        <option {{ $brand->is_featured == 1 ? 'selected' : '' }} value="1">{{__('Featured Brand')}}</option>
                                        {{-- <option {{ $product->is_top == 1 ? 'selected' : '' }} value="4">{{__('admin.Top Product')}}</option> --}}
                                        {{-- <option {{ $product->is_best == 1 ? 'selected' : '' }} value="5">{{__('admin.Best Product')}}</option> --}}
                                        {{-- <option {{ $product->is_flash_deal == 1 ? 'selected' : '' }} value="6">{{__('admin.Flash Deal Product')}}</option> --}}

                                    </select>
                                </div>
                                @if ($brand->is_flash_deal == 1)
                                    <div class="form-group col-12" id="dateBox">
                                        <label for="">{{__('admin.Enter Date')}}</label>
                                        <input type="text" name="date" class="form-control datepicker" value="{{ $brand->flash_deal_date }}" autocomplete="off">
                                    </div>
                                @else
                                    <div class="form-group col-12 d-none" id="dateBox">
                                        <label for="">{{__('admin.Enter Date')}}</label>
                                        <input type="text" name="date" class="form-control datepicker" autocomplete="off">
                                    </div>
                                @endif




                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Update')}}</button>
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
        $(document).ready(function () {
            $("#product_type").on("change",function(){
                var productType = $(this).val();
                if(productType == 6){
                    $("#dateBox").removeClass('d-none');
                }else{
                    $("#dateBox").addClass('d-none');
                }


            })
        });
    })(jQuery);


</script>


@endsection
