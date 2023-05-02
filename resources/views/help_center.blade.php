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
            <div class="grey-border px-5 py-4">
                <form action="">
                    <div class="form-group">
                        <label for="">EMAIL ADDRESS <span class="required">*</span></label>
                        <input type="text" placeholder="Email Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">How often do you use eIndustrify?</label>
                        <input type="text" placeholder="Email Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">what is your most loved feature of eindustrify website?</label>
                        <input type="text" placeholder="Type something.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">would you recommend eindustrify to a friend or a colleague?</label>
                        <input type="text" placeholder="Type something.." class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-check d-flex justify-content-between">
                            <input class="form-check-input" type="checkbox" id="recPerFeedback">
                            <label class="form-check-label label-light-weight" for="recPerFeedback">Receive personal follow-up to your feedback.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-bg w-100">Submit Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection
