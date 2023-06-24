@extends('vendor.layout.master')
@section('title', '')
@section('content')

<style>
.vendor-order-content .order-btn{
    background:#B0191E;
    padding: 10px 20px 10px 20px;
    width: 150px;
}
.vendor-order-content .order-btn:focus{
    box-shadow:none;
}
.vendor-order-content .all-dropdown{
background:#EFD1D2;
color:#B0191E;
}
.vendor-order-content .all-dropdown-c{
color:#B0191E !important;
}
.vendor-order-content .nav-link{
font-weight:600;
}
.vendor-order-content .p{
    font-size:14px;
}
.vendor-order-content .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 1.5rem;
    padding-left: 1.5rem;
}
.vendor-order-content .toggle-arrow .dropdown-toggle::after {
    margin-left: 40%;
}
.vendor-order-content table .circle-success {
    color: #4CE13F;
    font-size: 10px;
    }
.vendor-order-content table .fa-eye, .fa-trash{
    color:#7F7F7F;
    cursor: pointer;
}
.vendor-order-content table .fa-trash:hover{
    color:#B0191E;
}
.vendor-order-content table td{
vertical-align: middle;
}

.vendor-order-content .min{
    overflow: auto;
}
.vendor-order-content table{
    min-width: 800px;
}
.vendor-order-content .bg-search{
    background:#F2F2F2 ;
}

.vendor-order-content input:focus + .fa-search-icon {display: none;}
.vendor-order-content .fa-search-icon:hover{
    display: none;
}
.vendor-order-content .search {
	margin-bottom: 30px;
}
.vendor-order-content .base{
    align-items: baseline;
}
.vendor-order-content [data-filter-item] {
	padding: 15px;
	border: 1px solid #fff;
}
.vendor-order-content .hidden {
	display: none;
}
.vendor-order-content .sort-by {
    margin-top: -8px
}
.vendor-order-content .search {
    margin-bottom: 0px;
}
.vendor-order-content .fa-search  {
   color:#BEBEBE;
   font-size:12px;
}
.vendor-order-content .fa-search  {
    top:33px;
   right: ;
}
@media screen and (min-width: 768px) {
.bg-search{
    padding-bottom:55px;
}
}

</style>


<div class="p-xl-4  p-2 admin-main-content border">
<div class="vendor-order-content">
<div class="d-flex justify-content-between ">
<div class="d-flex align-items-center">
<img src="{{ asset('public/uploads/customer-img.png') }}" class="img-fluid" height="35px" width="35px">
<h4 class="ms-3 text-black d-none d-sm-block">Customers</h4>
</div>

<a href="" class="btn order-btn ms-3 rounded-0 text-white">Export</a>

</div>
<nav class="navbar navbar-expand-lg navbar-light border p-3 d-flex justify-content-between mt-3 ">

        <input type="text" class="p-2 ps-5 w-100 me-5 bg-search rounded-0 search position-relative" id="searchInput" placeholder="search" data-search />
        <i class="fas fa-search position-absolute ms-2"></i>
  <div>
  <fieldset class="sort-by">
                    <legend>SORT BY</legend>
                    <div class="dropdown">
                        <a class="btn ps-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Top Reviews</a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </fieldset>
  </div>
</nav>
<div class=" rounded min pt-3 items">
    <table class="table table-striped table-borderless">
      <thead class="table-dark align-items-center">
        <tr>
          <td>
            <form action="/action_page.php"><input type="checkbox" id="checkAll" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
          <td>Customer Name</td>
          <td>Email Subscription</td>
          <td>Location</td>
          <td>Orders</td>
          <td>Amount Spent</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Alicia White</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>9 Order</td>
          <td>$ 3,023.00</td>

          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td >
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Jack Black</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>2 Order</td>
          <td>$ 3,023.00</td>
          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td >
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Kashif</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>2 Order</td>
          <td>$ 3,023.00</td>

          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td>
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Jack Black</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>1 Order</td>
          <td>$ 3,023.00</td>

          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td >
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Alex</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>2 Order</td>
          <td>$ 3,023.00</td>

          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td >
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Kashif</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>3 Order</td>
          <td>$ 3,023.00</td>
          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr >
        <td >
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>jack</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>8 Order</td>
          <td>$ 3,023.00</td>
          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
        <tr>
        <td>
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>Jack Black</td>
          <td><span class="fas fa-circle circle-success"></span>  subscribed</td>
          <td>Houston, Texas</td>
          <td>1 Order</td>
          <td>$ 3,023.00</td>
          <td>
            <div class="d-flex">
            <i class="fas fa-eye"></i>
            <i class="fas fa-trash ms-2"></i>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script>
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

</script>
@endsection
