
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

        .jquery-uploader-select>.upload-button {
            height: unset;
        }

        .jquery-uploader-select>.upload-button span {
            color: #BBBBBB;
            text-transform: uppercase;
            font-weight: 600;
        }

        .jquery-uploader-select-card:hover {
            border-color: #b0191e;
        }

        .add-product-content .fa-arrow-left {
            width: 30px;
        }

        .add-product-content button {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .add-product-content .fa-eye,
        .fa-trash {
            color: #7F7F7F;
            font-size: 16px;
            cursor: pointer;
            background: #F2F2F2;
        }

        .add-product-content .fa-trash:hover {
            color: #B0191E;
        }
        .add-product-content label {
            display: block;
        }

    </style>
    <div class="p-xl-4 p-2 admin-main-content border add-product-content">

        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <button><span class="fas fa-arrow-left p-2"></span></button>
                <h4 class="ms-2">#481293</h4>
            </div>
            <div>
                <span class="fas fa-eye p-2"></span>
                <span class="fas fa-trash p-2"></span>
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

    </script>

@endsection
