@extends('vendor.layout.master')
@section('title', '')
@section('content')
<style>
    .store-header {
        border-bottom: 2px solid #CCCCCC;
    }
    .tx-data {
        background: #F2F2F2;
        padding: 16px;
    }
    .tx-img {
        width: 40px;
    }
    @media(max-width: 575px) {
        .tx-data {
            padding: 8px 16px 8px 2px;
        }
        .tx-img {
            width: 30px;
        }
    }
</style>
    <div class="mt-lg-0 mt-3 admin-main-content border add-product-content">
        <div class="mx-auto store-header">
            <div class="col-11 py-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/tax-duty.png') }}">
                    <h3 class="ms-3">Taxes and duties</h3>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-5">
            <div class="col-11 mb-3 mx-auto">
                <h6 class="mb-2">Manage sales tax collection</h6>
                <p>If you haven’t already, create a shipping zone in the region(s) you’re liable in. Then, find the region in this list and select it to manage its tax settings. If you’re unsure about where you’re liable, check with a tax professional.</p>
            </div>
            <div class="row col-11 mx-auto mb-2 align-items-center tx-data">
               <div class="col-xl-8 col-7 d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/usa.png') }}" class="tx-img">
                    <b class="ms-3">USA</b>
                </div>
                <b class="col-3">7%</b>
                <div class="col-xl-1 col-2">
                    <a class="nav-link font-700" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">...</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div class="row col-11 mx-auto mb-2 align-items-center tx-data">
                <div class="col-xl-8 col-7 d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/world.png') }}" class="tx-img">
                    <b class="ms-3">Rest of World</b>
                </div>
                <b class="col-3">16%</b>
                <div class="col-xl-1 col-2">
                    <a class="nav-link font-700" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">...</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
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
