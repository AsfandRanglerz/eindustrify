@extends('layout')
@section('title')
    <title>{{__('user.Reset Password')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Reset Password')}}">
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
                        <h3 class="heading">{{__('user.Reset Password')}}</h3>
                        <p>Fill the below fields to reset your password</p>
                        <div class="wsus__login">
                            <form method="POST" action="{{ URL('update-password') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{$data->token}}">
                                <input type="hidden" name="email" value="{{$data->email}}">
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/lock.png') }}" alt="lock" class="icon-left">
                                    <input type="password" placeholder="New Password" name="password" id="userPassword" class="pl-pr-padding">
                                    <span toggle="#userPassword" class="fas fa-eye preview-eye-icon toggle-password" aria-hidden="true"></span>
                                </div>
                                <div class="position-relative wsus__login_input">
                                    <img src="{{ asset('public/uploads/website-images/images/lock.png') }}" alt="lock" class="icon-left">
                                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirmPassword" class="pl-pr-padding">
                                    <span toggle="#confirmPassword" class="fas fa-eye preview-eye-icon toggle-password" aria-hidden="true"></span>
                                </div>
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
