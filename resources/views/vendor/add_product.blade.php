@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <style>
        .jquery-uploader-preview-container {
            padding: 0;
        }
        .jquery-uploader-select {
            background: #F6F6F6;
        }
        .jquery-uploader-select-card {
            border: 1px dashed #CCCCCC;
            padding: 0;
        }
        .jquery-uploader-select > .upload-button {
            height: unset;
        }
.jquery-uploader-select > .upload-button span {
    color: #BBBBBB;
    text-transform: uppercase;
    font-weight: 600;
}
.jquery-uploader-select-card:hover {
    border-color: #b0191e;
}
    </style>
    <div class="p-xl-4 p-2 admin-main-content border">
        <button><span class="fa fa-long-arrow-alt-left"></span></button>
        <h6>Add Product</h6>

        <div class="row">
            <div class="col-sm-8">
                <label class="text-uppercase">title</label>
                <input type="text" class="form-control" placeholder="Add Product Name">

                <h6 class="text-uppercase">Media</h6>
                <input type="text" id="example" value="" />

            </div>
            <div class="col-sm-4">
                <h6 class="text-uppercase">product status</h6>
                <select name="" id="">
                    <option value="">Draft</option>
                </select>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('error'))
        <script>
            toastr.error('{{ \Illuminate\Support\Facades\Session::get('error') }}');
        </script>
    @endif
    <script>
    $(function() {
        $("#example").uploader({
            multiple:true,
        });
    });
    </script>
@endsection
