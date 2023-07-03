@extends('admin.master_layout')
@section('title')
    <title>{{ __('Technical Support') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Update Technical Support') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.technical-support') }}">{{ __('Technical Support') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Terms & Condition') }}</div>
                </div>
            </div>
            <div class="section-body">
                <a href="{{ route('admin.technical-support') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('technical-support') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-technical-support') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $TechnicalSupport->id }}">
                                        <div class="form-group col-12">
                                            <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="Deleivered"{{ $TechnicalSupport->status == 'Deleivered' ? 'selected' : '' }}>Deleivered</option>
                                                <option value="In Progress"{{ $TechnicalSupport->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="Complete"{{ $TechnicalSupport->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                                            </select>

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
