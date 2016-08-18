 @extends('user.base_template')

 @section('content')
 <div class="container padding-top-100">
    <?php $count = 0 ?>
    @foreach ($products as $product)
        
        <a href="{{ url('/products/' . $product->id) }}">
        <div class="col-md-6 product-item padding-top-50">
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
        </a>
    @endforeach
</div>
@stop
