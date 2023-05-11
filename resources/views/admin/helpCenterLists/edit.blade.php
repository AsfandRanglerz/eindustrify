@extends('admin.master_layout')
@section('title')
    <title>{{ __('Help Center Lists') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Update Help Center Lists') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.help-center-lists') }}">{{ __('Help Center Lists') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Help Center Lists') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.help-center-lists') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('help-center-lists') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-help-center-lists') }}" method="POST"
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
                                            <textarea type="text" id="editor" class="form-control" name="description"
                                                placeholder="Description ...">{{ $data->description }}</textarea>
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
