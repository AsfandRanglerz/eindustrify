@extends('admin.master_layout')
@section('title')
    <title>{{ __('Terms & Condition') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Update Terms Of Registration') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.terms-registration') }}">{{ __('Terms Of Registration') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Terms Of Registration') }}</div>
                </div>
            </div>
            <div class="section-body">
                <a href="{{ route('admin.terms-registration') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('terms-registration') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-terms-registration') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="form-group col-12">
                                            <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="Title"
                                                value="{{ $data->title }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                            <input type="file" id="name" class="form-control" name="image"
                                                value="{{ $data->image }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                                            <textarea type="text" id="editor" class="form-control" name="description" placeholder="Description ...">{{ $data->description }}</textarea>
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
