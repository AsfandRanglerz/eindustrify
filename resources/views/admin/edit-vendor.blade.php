@extends('admin.master_layout')
@section('title')
<title>{{__('Update Customer')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Update Vendor')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.seller-list') }}">{{__('admin.Vendor List')}}</a></div>
              <div class="breadcrumb-item">{{__('Update Customer')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.seller-list') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Vendor List')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-vendor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group col-12">
                                    <label>{{__('First Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="first_name" placeholder="First Name" value="{{$data->first_name}}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Last Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="last_name" placeholder="Last Name" value="{{$data->last_name}}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Email Address')}} <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control"  name="email" placeholder="Example@gmail.com" value="{{$data->email}}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                    <input type="tel" id="email" class="form-control"  name="phone" placeholder="92xxxxxxxxxx" value="{{$data->phone}}">
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
                                    <button class="btn btn-primary">{{__('admin.Save')}}</button>
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
        $(document).ready(function () {
            $("#name").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })
        });
    })(jQuery);

    function convertToSlug(Text)
        {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
        }
</script>
@endsection
