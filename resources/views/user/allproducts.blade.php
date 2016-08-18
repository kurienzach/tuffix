@extends('user.base_template')

@section('content')
<div class="container padding-top-100">
    <div class="row">
        <div class="col-md-12 hero-product">
            <img src="{{ asset('/img/products.jpg') }}"> 
        </div>        
    </div>

    <div class="row">
        <?php $z = count($categories); ?>
        @foreach ($categories as $category)
        <div id="category{{ $category['category']->id }}" class="col-md-12 category-main" style="z-index: {{ $z }}">

            <h4>{{ $category['category']->name }}</h4>
            <div class="col-md-9">
                <p>{{ $category['category']->description }}</p>
            </div>

            <div class="col-md-3">

                <ul class="category-alternate">
                    @foreach ($category['sub_category'] as $subcategory)
                    <li><a href="{{ url('/category/' . $subcategory->id) }}">{{ $subcategory->name }}</a><i class="fa fa-caret-right"></i></li>
                    @endforeach
                </ul>
                
            </div>

        </div>
        <?php $z = $z - 1; ?>
        @endforeach
    </div>
</div>
@stop
