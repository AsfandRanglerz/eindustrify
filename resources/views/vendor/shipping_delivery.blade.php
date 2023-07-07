@extends('vendor.layout.master')
@section('title', '')
@section('content')
<style>
    .store-header {
        border-bottom: 1px solid #CCCCCC;
    }
    .ship-policy-block .paragraph {
        width: 75%;
    }
    .local-pickup {
        column-gap: 16px;
    }
    .local-pickup .inner {
        display: flex;
        align-items: center;
        background: #F2F2F2;
        padding: 8px 16px;
    }
    @media(max-width: 767px) {
        .ship-policy-block .paragraph {
            width: 100%;
            text-align: justify;
            margin-bottom: 12px;
        }
    }
</style>
    <div class="mt-lg-0 mt-3 admin-main-content border add-product-content">
        <div class="mx-auto store-header">
            <div class="col-11 py-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/shipping-delivery.png') }}">
                    <h3 class="ms-3">Shipping and Delivery</h3>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-5">
            <div class="col-11 mb-3 mx-auto">
                <h6 class="mb-3">Local Pickup</h6>
                <div class="d-flex flex-md-row flex-column mb-3 local-pickup">
                    <div class="mb-md-0 mb-2">
                        <div class="inner">
                            <img src="{{ asset('public/uploads/website-images/images/map-marker.png') }}" class="me-3">
                            <div>
                                <small>Default</small>
                                <p class="font-700">Street, 6001 W Waco Dr #314. New York, USA , 40223</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="inner">
                            <img src="{{ asset('public/uploads/website-images/images/map-marker.png') }}" class="me-3">
                            <div>
                                <small>Location 2</small>
                                <p class="font-700">Street, 6001 W Waco Dr #314. New York, USA , 40223</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mb-2">Shipping Policies</h6>
                <div class="d-flex flex-md-row flex-column justify-content-between ship-policy-block">
                    <p class="paragraph">Shipping zone is geographic region where certain set of shipping methods are offered. we will match
                        a customer to a single zone using their shipping address and present shipping method that zone to
                        them.</p>
                    <div class="text-md-right text-center">
                        <button class="btn-bg">Click to Add Policy</button>
                    </div>
                </div>
                <div class="mt-4 table-responsive text-center">
                    <table class="table table-striped table-borderless">
                        <thead class="table-dark align-items-center">
                            <tr>
                                <td>Zone Name</td>
                                <td>Region</td>
                                <td>Shipping Method</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Worldwide</td>
                                <td>Worldwide</td>
                                <td>No Shipping Found</td>
                                <td>
                                    <a class="nav-link font-700" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">...</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


















            {{-- <div class="row col-11 mx-auto mb-3 connected-method">
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
            </div> --}}
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
