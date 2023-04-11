@extends('layout')
@section('title')
    <title>{{__('user.Login')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Login')}}">
@endsection
<style>
    .side-section {
        height: 100%;
    }

    img[alt="login-side-img"] {
        height: 100%;
    }

    .side-section-content {
        top: 0;
    }
</style>
@section('public-content')


    <!--============================
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register" class="py-5">
        <div class="container">
            <div class="col-xl-9 mx-auto row">
                <div class="col-xl-7 col-md-6">
                    <div class="wsus__forget_area">
                        <h4>Login to your account.</h4>
                        <p>Fill your email and password to login</p>
                        <div class="wsus__login">
                            <form method="POST">
                                @csrf
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/envelope.png') }}" alt="envelope">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/lock.png') }}" alt="lock" class="icon-left">
                                    <input type="password" placeholder="Password" name="password" class="padding-left-input">
                                </div>
                                @if($recaptchaSetting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <a href="">Forgot your password?</a>
                                </div>
                                <button class="common_btn" href="" type="submit">Login</button>
                                <p>No account yet? <a href="">Register here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="position-relative side-section">
                        <img src="{{ asset('public/uploads/website-images/images/login-side-img.png') }}" alt="login-side-img" class="img-fluid w-100">
                        <div class="position-absolute side-section-content">
                            <h6 class="text-white">Register today and you will be able to</h6>
                            <ul>
                                <li class="text-white"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}">Speed your way through checkout</li>
                                <li class="text-white"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}">Track your orders easily</li>
                                <li class="text-white"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}">Keep a record of all your purchases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->

@endsection
