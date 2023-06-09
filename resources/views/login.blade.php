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
            <div class="col-xl-10 mx-auto row">
                <div class="col-xl-8 col-md-6">
                    <div class="pb-5 wsus__forget_area">
                        <h3 class="text-inherit heading">Login to your account.</h3>
                        <p>Fill your email and password to login</p>
                        <div class="wsus__login">
                            <form action="{{Url('login')}}" method="POST">
                                @csrf
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/envelope.png') }}" alt="envelope">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/lock.png') }}" alt="lock" class="icon-left">
                                    <input type="password" placeholder="Password" name="password" id="userPassword" class="pl-pr-padding">
                                    <span toggle="#userPassword" class="fas fa-eye preview-eye-icon toggle-password" aria-hidden="true"></span>
                                </div>
                                {{-- @if($recaptchaSetting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif --}}
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <a href="{{ url('forget-password') }}" class="red-link">Forgot your password?</a>
                                </div>
                                <button class="mb-4 common_btn" href="" type="submit">Login</button>
                                <p class="reg-account">No account yet? <a href="{{ url('register') }}" class="font-600 red-link">Register here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 px-0 col-md-6">
                    <div class="position-relative side-section">
                        <img src="{{ asset('public/uploads/website-images/images/login-side-img.jpg') }}" alt="login-side-img" class="img-fluid w-100">
                        <div class="position-absolute py-5 px-4 side-section-content">
                            <h3 class="text-white position-relative heading">Register today and you will be able to</h3>
                            <ul>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Speed your way through checkout</li>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Track your orders easily</li>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Keep a record of all your purchases</li>
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
