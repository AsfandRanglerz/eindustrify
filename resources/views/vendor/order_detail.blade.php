
@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <style>

        .order-detail-page .fa-arrow-left {
            width: 30px;
        }

        .order-detail-page button {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .order-detail-page .fa-eye,
        .fa-trash {
            color: #7F7F7F;
            font-size: 16px;
            cursor: pointer;
            background: #F2F2F2;
        }

        .order-detail-page .fa-trash:hover {
            color: #B0191E;
        }
        .order-detail-page label {
            display: block;
        }
        .order-detail-page .fa-circle {
            color:#4CE13F;
            font-size:12px;
        }
        .order-detail-paget button {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .order-detail-page .fa-pen,
        .fa-trash {
            color: #7F7F7F;
            font-size: 16px;
            cursor: pointer;
            background: #F2F2F2;
        }

        .order-detail-page .fa-trash:hover {
            color: #B0191E;
        }

        .order-detail-page .form-select:focus {
            box-shadow: none;
            outline: none;
            border-color: #000;
        }

        .order-detail-page label {
            display: block;
        }

        .order-detail-page .variant {
            color: #B0191E;
        }

        .order-detail-page .submitt button {
            background: #B0191E;
            color: #fff;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background: #000;
            color: #fff;
            font-size: 15px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #000;
    border-color: #000;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display {
    cursor: default;
    padding-left: 12px;
    padding-right: 12px;
}
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #FFF;
            font-size: 15px;
            background: #000;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #000 !important;
            color: #fff;
        }
        .order-detail-page .base {
            align-items: baseline;
        }

        .order-detail-page [data-filter-item] {
            padding: 15px;
            border: 1px solid #fff;
        }

        .order-detail-page .hidden {
            display: none;
        }

        .order-detail-page .sort-by {
            margin-top: -8px
        }

        .order-detail-page .min{
    overflow: auto;
}
        .order-detail-page .padding {
            background: #F2F2F2;
        }

        .order-detail-page .table-striped {
            background: #FBFBFB;
        }

        .order-detail-page .table>:not(caption)>*>* {
            padding: 1.5rem 0.5rem;
        }
        .order-detail-page table {
            min-width: 400px;
        }
    </style>
    <div class="p-xl-4 p-2 admin-main-content border order-detail-page">

        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <button><span class="fas fa-arrow-left p-2"></span></button>
                <h3 class="ms-2">#Mophorn 3 HP Electric Motor 1...</h3>
                <span class="fas fa-circle ms-3"><span class="text-black ms-1">Active</span></span>
            </div>
            <div>
                <span class="fas fa-eye p-2"></span>
                <span class="fas fa-trash p-2"></span>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">

<div class="row mt-5">
    <div class="col-sm-8">
        <label class="text-uppercase fw-bold">title</label>
        <input type="text" class="form-control" placeholder="Add Product Name" name="name">
        <div class="form-group mt-3">
            <label for="exampleFormControlTextarea1" class="text-uppercase">description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="long_description"></textarea>
        </div>

        <div class="mt-3">
            <h6 class="text-uppercase">Media</h6>
            <input type="text" name="image[]" id="example" value="" />
        </div>

        <div id='extra-item'></div>
        <div class="d-flex justify-content-between mt-3 p-3 align-items-center">
            <h6 class="text-uppercase fw-bold">variants</h6>
            <button type="button" id="add" class="text-uppercase add-more variant text-underline fw-bold border-0"
                >+ variants</button>
        </div>
        <table class="table table-striped table-borderless">
                    <thead class="table-dark align-items-center">
                        <tr>
                            <td>
                                <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                        class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                            </td>
                            <td>SKU</td>
                            <td>Variant</td>
                            <td>Price</td>
                            <td>Discount Price</td>
                            <td>Quantity</td>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="POST">
                                <tr>
                                    <td>
                                        <input type="checkbox" id="vehicle1" class="check form-check-input ms-3"
                                            name="" value="">
                                    </td>
                                    <td>
                                    121
                                    </td>
                                    <td>3 HP</td>
                                        <td>$500.00</td>
                                    <td>$500.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span>21</span>
                                            <span class="fas fa-pen ms-2"></span>
                                            <a href="" class="btn-sm"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="vehicle1" class="check form-check-input ms-3"
                                            name="" value="">
                                    </td>
                                    <td>
                                    121
                                    </td>
                                    <td>3 HP</td>
                                        <td>$500.00</td>
                                    <td>$500.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span>21</span>
                                            <span class="fas fa-pen ms-3"></span>
                                            <a href="" class="btn-sm"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                        </div>
                                    </td>
                                </tr>
                        </form>
                    </tbody>
                </table>




    </div>


    <div class="col-sm-4 product-status mt-1">
        <h6 class="text-uppercase mb-2">product status</h6>
        <select name="status" id="" class="js-example-basic-single"
            aria-label="Default select example">

            <option value="1">Active</option>
            <option value="0">Deactive</option>
        </select>
        <h6 class="text-uppercase mb-2 mt-3">product orgonization</h6>
        <label class="text-uppercase">category</label>
        <select class="js-example-basic-single pt-2 pb-2 form-control" name="category_id" multiple="multiple">
            <option value="">select category</option>

                <option value=""></option>

        </select>

        <label class="text-uppercase mt-3">sub category</label>
        <select class="js-example-basic-single pt-2 pb-2 form-control" name="subcategory_id">
            <option value="find">select subcategory</option>
                <option value=""></option>

        </select>

        <label class="text-uppercase mt-3">child category</label>
        <select class="js-example-basic-single pt-2 pb-2 form-control" name="childcategory_id">
            <option value="find">select childcategory</option>
                <option value="">name</option>

        </select>
        <label class="text-uppercase mb-2 mt-3">tags</label>
        <select class="js-example-tokenizer pt-2 pb-2 form-control" name="tags[]" multiple="multiple">
            <option value="find">find or create tags</option>
            <option value="a">abc</option>
        <option value="d">dc</option>
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

        $('.js-example-basic-single').select2();

        $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
        })
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
        $(document).ready(function() {
    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });
    $('#searchInput').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('table tr').each(function() {
            var lineText = $(this).text().toLowerCase();
            if (lineText.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});

        CKEDITOR.replace('long_description');
    </script>

@endsection
