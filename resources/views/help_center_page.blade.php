@extends('layout')
@section('title')
    <title>Help Center</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset($helpCenter->image) }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">{{ $helpCenter->title }}</h1>
                </div>
            </div>
            <div class="mt-4 row">
                @if (Request::path() === 'help-center-details')
                    <div class="col-xl-12 text-center">
                        {!! $helpCenter->description !!}
                        <h4 class="mt-lg-5 mt-4">How can I contact eindustrify?</h4>
                        <div class="mt-3 mb-4 text-start row">
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/dialer.png') }}"
                                            alt="dialer">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Call</h5>
                                        <p class="text-white d-block text">1 888 eIndustrify</p>
                                        <p class="text-white d-block text">1 888 7747632</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-md-0 my-1">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/email.png') }}"
                                            alt="email">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Email</h5>
                                        <a href="mailto:info@eindustrify.com"
                                            class="text-white d-block text">info@eindustrify.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-lg-0 mt-md-3">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/location.png') }}"
                                            alt="location">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Address</h5>
                                        <p class="text-white d-block text">11111 Katy Freeway, Suite 910, Houston TX 77079
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Thank you for choosing E-industrify for your business needs. If you have any additional queries
                            or
                            concerns, please do not hesitate to reach out to our customer support team for assistance. We
                            are
                            here to help!</p>
                    </div>
                @else
                    <div class="col-xl-12">
                        {!! $helpCenter->description !!}
                        <h4 class="mt-lg-5 mt-4">How can I contact eindustrify?</h4>
                        <div class="mt-3 mb-4 text-start row">
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/dialer.png') }}"
                                            alt="dialer">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Call</h5>
                                        <p class="text-white d-block text">1 888 eIndustrify</p>
                                        <p class="text-white d-block text">1 888 7747632</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-md-0 my-1">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/email.png') }}"
                                            alt="email">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Email</h5>
                                        <a href="mailto:info@eindustrify.com"
                                            class="text-white d-block text">info@eindustrify.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-lg-0 mt-md-3">
                                <div class="contact-eindus-block">
                                    <div>
                                        <img src="{{ asset('public/uploads/website-images/images/location.png') }}"
                                            alt="location">
                                    </div>
                                    <div>
                                        <h5 class="text-white d-block mb-3">Address</h5>
                                        <p class="text-white d-block text">11111 Katy Freeway, Suite 910, Houston TX 77079
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Thank you for choosing E-industrify for your business needs. If you have any additional queries
                            or
                            concerns, please do not hesitate to reach out to our customer support team for assistance. We
                            are
                            here to help!</p>
                    </div>
                @endif
            </div>
            <h4 class="text-center mt-lg-5 mt-4 mb-3">Are you looking for help with...</h4>
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-3">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Placing Orders</h5>
                        <p class="mb-3 text">Quotes</p>
                        <p class="mb-3 text">Lists</p>
                        <p class="text">Reorder</p>
                    </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-3">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Order Information</h5>
                        <p class="mb-3 text">Order History & Tracking</p>
                        <p class="mb-3 text">Online Invoices</p>
                        <p class="text">Returns & Cancellations</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Account Settings</h5>
                        <p class="mb-3 text">Checkout</p>
                        <p class="mb-3 text">User Management</p>
                        <p class="text">Account Settings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                CUSTOM PAGES PAGE END
            ==============================-->
@endsection
