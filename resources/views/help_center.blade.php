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
            <div class="row">
                <div class="col-xl-6 col-lg-8 mx-auto">
                    <div class="mb-4 d-flex justify-content-center align-iems-center">
                        <img src="{{ asset('public/uploads/website-images/images/help-heart.png') }}" alt="help-heart">
                        <h3 class="ms-3">Help us improve</h3>
                    </div>
                    <div class="grey-border rounded px-sm-5 px-3 py-sm-5 py-3">
                        <div class="px-sm-5">
                            <form action="">
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Email Adress <span class="required">*</span></label>
                                    <input type="text" placeholder="Email Address" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">How often do you use eIndustrify?</label>
                                    <select id="useIndus" class="form-control">
                                        <option value=""></option>
                                        <option value="1">Everyday / once a week / never</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">what is your most loved feature of eindustrify website?</label>
                                    <input type="text" placeholder="Type something.." class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">would you recommend eindustrify to a friend or a colleague?</label>
                                    <select name="" id="recomIndus" class="form-control">
                                        <option value=""></option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-check d-flex justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="recPerFeedback">
                                    <label class="form-check-label label-light-weight" for="recPerFeedback">Receive personal follow-up to your feedback.</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-bg w-100">Submit Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection
@section('js')
    <script>
        $(function() {
            $('#useIndus').select2({
                placeholder: 'Select Option',
            });
            $('#recomIndus').select2({
                placeholder: 'Yes / No',
            });
        });
    </script>
@endsection
