<div id="myCarousel" class="carousel slide clearfix" data-interval="3200" data-ride="carousel">

    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>


    <div class="carousel-inner">
        <?php $count = 0; ?>
        @foreach($products as $product)
            @if ($count == 0)
            <div class="active item">
            @else
            <div class="item">
            @endif
            <a href="{{ url('/products/' . $product->id) }}">
                <div class="col-md-5"><div class="row"><div class="item-img" style="width:90%;">
                @if(!empty($product->images()->first()->img_url))
                    <img src="{{ asset('/img/productimg/' . $product->images()->first()->img_url) }}">
                @else
                    <img src="{{ asset('/img/default.png') }}">
                @endif
                </div></div></div>

                <div class="col-md-7">       

                <div class="row"><div class="item-box"><div class="vsplit1"><h4>{!! Html::decode($product->product_name) !!}</h4></div></div></div>
                <div class="row"><div class="item-box yellow"><div class="vsplit1"><h4>{{ $product->attr1_name }}</h4></div><div class="vsplit2"><p>{!! Html::decode($product->attr1_value) !!}</p></div></div></div>
                <div class="row"><div class="item-box"><div class="vsplit1"><h4>{{ $product->attr2_name }}</h4></div><div class="vsplit2"><p>{!! Html::decode($product->attr2_value) !!}</p></div></div></div> 

                </div>
            </a>
            </div>
            <?php $count = $count + 1; ?>
        @endforeach
    </div>
</div>
<!-- caurosel end--> 
