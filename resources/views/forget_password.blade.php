@extends('layout')
@section('title')
    <title>{{__('user.Forget Password')}}</title>
@endsection
@section('meta')
    <meta name="description" content="Login">
@endsection

@section('public-content')


    <!--============================
         BREADCRUMB START
    ==============================-->
    {{-- <section id="wsus__breadcrumb" style="background: url({{  asset($banner->image) }});">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>{{__('user.Forget Password')}}</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">{{__('user.home')}}</a></li>
                            <li><a href="{{ route('forget-password') }}">{{__('user.Forget Password')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        FORGET PASSWORD START
    ==============================-->
    <section id="wsus__login_register" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="wsus__forget_area">
                        <h3 class="heading">{{__('user.Forget Password')}}?</h3>
                        <p>Please enter your email address. You will receive a link to create a new password via email.</p>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('send-forget-password') }}">
                                @csrf
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/envelope.png') }}" alt="envelope">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                                @if($recaptchaSetting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif
                                <button class="common_btn" href="" type="submit">Reset Password</button>
                            </form>
                        </div>

                        {{-- <a class="see_btn mt-4" href="{{ route('login') }}">{{__('user.go to login')}}</a> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--============================
        FORGET PASSWORD END
    ==============================-->

@endsection
