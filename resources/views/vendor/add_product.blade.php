@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <style>
        .jquery-uploader-preview-container {
            padding: 0;
        }

        .jquery-uploader-select {
            background: #F6F6F6;
        }

        .jquery-uploader-select-card {
            border: 1px dashed #CCCCCC;
            padding: 0;
        }

        .jquery-uploader-select>.upload-button {
            height: unset;
        }

        .jquery-uploader-select>.upload-button span {
            color: #BBBBBB;
            text-transform: uppercase;
            font-weight: 600;
        }

        .jquery-uploader-select-card:hover {
            border-color: #b0191e;
        }

        .add-product-content .fa-arrow-left {
            width: 30px;
        }

        .add-product-content button {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .add-product-content .fa-eye,
        .fa-trash {
            color: #7F7F7F;
            font-size: 16px;
            cursor: pointer;
            background: #F2F2F2;
        }

        .add-product-content .fa-trash:hover {
            color: #B0191E;
        }

        .add-product-content .form-select:focus {
            box-shadow: none;
            outline: none;
            border-color: #000;
        }

        .add-product-content label {
            display: block;
        }

        .add-product-content .variant {
            color: #B0191E;
        }

        .add-product-content .submitt button {
            background: #B0191E;
            color: #fff;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background: #B0191E;
            color: #fff;
            font-size: 15px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #FFF;
            font-size: 15px;
            background: #B0191E;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #B0191E !important;
            color: #fff;
        }
    </style>
    <div class="p-xl-4 p-2 admin-main-content border add-product-content">

        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <button><span class="fas fa-arrow-left p-2"></span></button>
                <h4 class="ms-2">Add Product</h4>
            </div>
            <div>
                <span class="fas fa-eye p-2"></span>
                <span class="fas fa-trash p-2"></span>
            </div>
        </div>

        <form action="{{URL('create-product')}}" method="POST" enctype="multipart/form-data">

        <div class="row mt-5">
            <div class="col-sm-8">
                <label class="text-uppercase fw-bold">title</label>
                <input type="text" class="form-control" placeholder="Add Product Name" name="name">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="exampleFormControlTextarea1" class="text-uppercase">description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="long_description"></textarea>
                    </div>
                {{-- </form> --}}

                <div class="mt-3">
                    <h6 class="text-uppercase">Media</h6>
                    <input type="text" name="image[]" id="example" value="" />
                </div>
                {{-- <form class="mt-3"> --}}
                <div id="items">
                    <div class="d-flex mt-3">
                        <div class=" me-sm-3">
                            <label class="text-uppercase">shipping weight</label>
                            <input id="name" type="number" class=" p-2" placeholder="0.0" value=""
                                name="sku">
                        </div>

                        <!-- <div>
                            <label for="number">Qty</label>
                            <input type="number" id="quantity" class=" p-2" placeholder="Qty" name="qty"
                                min="1" max="100">
                        </div> -->
                        <div>
                            <label for="number">Wt.</label>
                            <input type="number" id="quantity" class=" p-2" placeholder="kg" name="qty"
                                min="1" max="100">
                        </div>
                    </div>

                    <h6 class="text-uppercase  mt-3">pricing</h6>
                    <div class="d-flex">
                        <div class="mt-3 me-sm-3">

                            <label for="number" class="text-uppercase">price</label>
                            <input id="name" type="number" class=" p-2" placeholder="$ 0.0" value=""
                                name="price">
                        </div>
                        <div class="mt-3" style="">
                            <label for="number" class="text-uppercase ">discounted price</label>
                            <input type="number" id="quantity" class=" p-2" placeholder="$ 0.0" name="discount_price">
                        </div>
                    </div>
                 </div>
                    <div id='extra-item' ></div>
                <div class="d-flex justify-content-between mt-3 p-3 border align-items-center">
                    <h6 class="text-uppercase fw-bold">variants</h6>
                    <a href="" id="add" class="text-uppercase add-more variant text-underline fw-bold border-0" type="submit">+ variants</a>
                </div>
                <div class="text-end submitt mt-2">
                    <button type="submit" class="p-2 fw-bold">Submit</button>
                </div>
            </div>
            <div class="col-sm-4 product-status mt-1">
                <h6 class="text-uppercase mb-2">product status</h6>
                <select name="status" id="" class="js-example-basic-single" aria-label="Default select example">
                    {{-- <option value="dra">Draft</option> --}}
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
                <h6 class="text-uppercase mb-2 mt-3">product details</h6>
                <label class="text-uppercase">category</label>
                <select class="js-example-basic-single pt-2 pb-2 form-control" name="category_id">
                    <option value="">select category</option>
                    @foreach ($user->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <label class="text-uppercase mt-3">sub category</label>
                <select class="js-example-basic-single pt-2 pb-2 form-control" name="subcategory_id">
                    <option value="find">select subcategory</option>
                    @foreach ($user->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>

                <label class="text-uppercase mt-3">child category</label>
                <select class="js-example-basic-single pt-2 pb-2 form-control" name="childcategory_id">
                    <option value="find">select childcategory</option>
                    @foreach ($user->childcategories as $childcategory)
                        <option value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                    @endforeach
                </select>
                <label class="text-uppercase mb-2 mt-3">tags</label>
                <select class="js-example-basic-multiple pt-2 pb-2 form-control" name="tags[]" multiple="multiple">
                    <option value="find">find or create tags</option>
                    {{-- <option value="a">abc</option>
                    <option value="d">dc</option> --}}
                </select>
            </div>

        </div>
    </form>
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
        $(function() {
            $("#example").uploader({
                multiple: true,
            });
        });
        $('select').select2({
            placeholder: ' please select your country',
            allowClear: true
        });

        $('.js-example-basic-single').select2();


        $('.js-example-basic-multiple').select2();
        $(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
    console.log('thisssss')
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    const ele = $("#items").clone()
    console.log(ele)
    $('#extra-item').append(ele)


  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
});


        CKEDITOR.replace('long_description');
    </script>

@endsection
