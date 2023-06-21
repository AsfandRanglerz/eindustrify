@extends('layout')
@section('title')
    <title>Product Detail</title>
@endsection
@section('meta')
    <meta>

<style>
#wsus__product_details ol li a{
font-size:14px;
font-weight:500;
}
#wsus__product_details .breadcrumb-item+.breadcrumb-item {
    padding-left: 2px;
}
#wsus__product_details .breadcrumb-item+.breadcrumb-item::before{
    padding-right: 2px;
}
#wsus__product_details .content-heading h2{

font-family: 'Roboto';
font-style: normal;
line-height: 42px;
color: #000000;
}
#wsus__product_details .cart-content{
background: #FFFFFF;
border: 1px solid #B7B7B7;
border-radius: 20px;
height:100vh;
}
</style>

@section('public-content')

<!--============================
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
    <div class="container">
    <div class="row">
    <div class="col-md-5">
   
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
    <div class="col-md-7">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Electric Motors</a></li>
    <li class="breadcrumb-item"><a href="#">Servo Motors & Accessories</a></li>
    <li class="breadcrumb-item"><a href="#">Servo Accessories</a></li>
    <li class="breadcrumb-item"><a href="#">Electric Motor 1 Phase</a></li>
    </ol>
    </nav>
    <div class="content-heading">
        <h2>Mophorn 3 HP Electric Motor 1 Phase AC Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW Air Compressor Motor, 115/230V</h2>
        <div class="cart-content">

        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->


<script>

</script>
@endsection
