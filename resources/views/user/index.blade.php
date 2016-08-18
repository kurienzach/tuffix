@extends('user.base_template')

@section('content')
<div class="index container">
    <div class="row">

    <div class="col-md-6">

        <h2>THE PROMISE OF QUALITY, ECONOMY AND RELIABILITY</h2><p></p>
        <p style="text-align: justify;">TUF-FIX brand's core focus is on Fasteners & Fixings, Painting Tools & Accessories, Locks and General Tools. TUF-FIX brand is synonymous with innovation, reliability and safety in the development of industrial related products all over the globe. TUF-FIX is upholding the most premium European quality at economical prices. Our quality regulations are extremely reliable across the TUF-FIX range, as we put our products through the toughest testing conditions in order to meet the highest standards.</p>

    <div style="margin-top: 90px;">
        <a class="btn btn-frnt page-scroll" style="margin-right: 10px" href="{{ asset('/Catalogue_2014.pdf') }}">Product Catalog</a>
        <a class="btn btn-frnt page-scroll" href="#contact">contact us</a>
    </div>

    </div>

    <!-- caurosel-->

    <div class="col-md-6" style="padding-top:80px;"> 
        @include('user.product_carousel', array("products"=>$products))
        <!--div class="text-center" style="margin-top:120px;">
            <a href="#" class="product-catalog"><i style="color: green; margin-right: 5px;" class="fa fa-cloud-download"></i>DOWNLOAD PRODUCT CATALOG</a>
        </div-->
    </div>
    </div>
</div>
@stop
