@extends('vendor.layout.master')
@section('title', '')
@section('content')
<style>
    .store-header {
        border-bottom: 2px solid #CCCCCC;
    }
    .connected-method {
        background: #F2F2F2;
        border: 1px solid #0D7D4D;
        padding: 16px 24px;
    }
    .connected-method .method-name {
        font-size: 20px;
        border-bottom: 1px solid #CCCCCC;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .connected-method .form-check-input:checked {
        background-color: #0D7D4D;
        border-color: #0D7D4D;
    }
    .connected-method label:not(.custom-control-label) {
        color: #0D7D4D;
        font-weight: 400;
    }
    .connected-method .method-img {
        width: 86px;
    }
    .connect-now {
        border: 1px solid #E7E7E7;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 36px;
    }
    @media(max-width: 575px) {
        .connected-method {
            padding: 16px 24px 16px 8px;
        }
        .connect-now {
            padding: 16px 16px;
        }
        .connected-method .method-img {
            width: 66px;
        }
        .connect-now .method-img {
            width: 60px;
        }
    }
</style>
    <div class="mt-lg-0 mt-3 admin-main-content border add-product-content">
        <div class="mx-auto store-header">
            <div class="col-11 py-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/pay-dollar.png') }}">
                    <h3 class="ms-3">Payments</h3>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-5">
            <div class="col-11 mb-3 mx-auto">
                <h6 class="mb-2">Supported payment methods</h6>
                <p>Payment methods that are available with one of eindustrify's approved payment providers.</p>
            </div>
            <div class="row col-11 mx-auto mb-3 connected-method">
                <div class="col-md-10 col-sm-9 col-8">
                    <p class="font-700 method-name">Stripe</p>
                    <p class="small transaction-fee">Transaction Fee</p>
                    <p class="font-700 transaction-percent">2%</p>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <img src="{{ asset('public/uploads/website-images/images/stripe2.png') }}" class="method-img">
                    <div class="mt-3 d-flex mb-0 form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="ms-2 mb-0 form-check-label" for="flexRadioDefault2">Connected</label>
                    </div>
                </div>
            </div>
            <div class="col-11 mx-auto connect-now">
               <div>
                    <img src="{{ asset('public/uploads/website-images/images/paypal2.png') }}" class="method-img">
                    <span class="ms-3">Paypal</span>
                </div>
                <a href="" class="red-link text-underline">Connect Now</a>
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
