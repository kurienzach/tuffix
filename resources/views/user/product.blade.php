@extends('user.base_template')

@section('content')
<div class="container padding-top-100">
    <div class="row">
        <p style="font-weight:400;color:#4e4e4e;padding-left:40px">
            <a href="{{ url('/products#category' . $parent_cat->id) }}"><strong>{{ $parent_cat->name }} </a> > </strong><light><a href="{{ url('/category/' . $product->category_id) }}">{{ $category->name }}</a> > {{ $product->attr1_value }}</light>
        </p>
    </div>
    <div class="row">
        <!-- Left Side -->
        <div class="col-md-7">
            <div class="col-md-12 padding-top-50">
                <div class="col-md-5"><div class="row"><div class="item-img">
                    @if (!empty($product->images()->first()->img_url))
                        <img src="{{ asset('/img/productimg/' . $product->images()->first()->img_url) }}">
                    @else
                        <img src="{{ asset('/img/default.png') }}">
                    @endif
                </div></div></div>
                
                <div class="col-md-7">       
                    
                    <div class="row"><div class="item-box"><div class="vsplit1"><h4>{!! Html::decode($product->product_name) !!}</h4></div></div></div>
                    <div class="row"><div class="item-box yellow"><div class="vsplit1"><h4>{!! Html::decode($product->attr1_name) !!}</h4></div><div class="vsplit2"><p>{!! Html::decode($product->attr1_value) !!}</p></div></div></div>
                    <div class="row"><div class="item-box"><div class="vsplit1"><h4>{!! Html::decode($product->attr2_name) !!}</h4></div><div class="vsplit2"><p>{!! Html::decode($product->attr2_value) !!}</p></div></div></div> 
                    
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-md-5 padding-top-50 product-desc">
            {!! Html::decode($product->description) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 padding-top-50 product-spec">
            {!! Html::decode($product->specification) !!}
        </div>
    </div>
</div>
@stop
