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
            <h1>Testing</h1>
            <img src="{{ asset('public/uploads/website-images/images/help-heart.png') }}" alt="help-heart">
            <form action="">
                <div class="form-group">
                    <label for="">EMAIL ADDRESS <span class="required">*</span></label>
                    <input type="text" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="">How often do you use eIndustrify?</label>
                    <input type="text" placeholder="Email Address">
                </div>
                <div class="form-group">

                </div>
            </form>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection

