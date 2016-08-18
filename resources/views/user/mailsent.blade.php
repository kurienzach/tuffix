@extends('user.base_template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 hero-product"></div>        
    </div>

    <div class="row category-main">
        <div class="col-md-12 text-center">
            <h3>Your request has been recorded, We will get in touch with you shortly.</h3>
            <a href="{{ url('/') }}"><i class="fa fa-angle-left"></i> Back to Home</a>
        </div>
    </div>
</div>
@stop
