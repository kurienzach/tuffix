@extends('layouts.admin_template')

@section('head')
<script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<!-- <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script> -->
@stop

@section('content')
<div class="page-header">
    <h1>Add Product</h1>
</div>

<a href="{{ url('/admin/products') }}" class="btn btn-default" style="margin-bottom: 10px">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
Back to Products
</a>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
    {!! Form::open(array('url'=> url('/admin/products/store'), 'files'=> true)) !!}

        @if ($errors->has())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
            </div>
        @endif

        <!--ID-->
        @if (isset($old_product)) 
            {!! Form::hidden('id', $old_product->id) !!}
        @endif

        <!--Product Name-->
        <div class="form-group">       
            {!! Form::label('Product Name') !!}
            @if (isset($old_product))
                {!! Form::text('product_name', $old_product->product_name,
                    array('required', 'class'=>'form-control')) !!}
            @else
                {!! Form::text('product_name', null,
                    array('required', 'class'=>'form-control')) !!}
            @endif
        </div>

        <!--Category-->
        <div class="form-group">       
            {!! Form::label('Product Category') !!}
            <select id="select-cat" name="category_id" class="form-control" required>
                    <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            @if (isset($old_product))
                <script>
                    document.getElementById('select-cat').value = {{ $old_product->category_id }};
                </script>
            @endif
        </div>

        <!--Images-->
        <div class="form-group">
            <h5>Product Images</h5>
            <div class="row">
            <div class="col-md-6 product-add-img">
                {!! Form::label('Current Image') !!}<br>    
                @if (!isset($old_product) || empty($old_product->images() )) 
                    <img class="thumbnail" src="{{ asset('/img/default.png') }}">
                @else
                    @foreach ($old_product->images as $image)
                        <img class="thumbnail" src="{{ asset('/img/productimg') . "/" . $image->img_url }}">
                    @endforeach
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('Upload Image') !!}
                {!! Form::file('img_url',
                        array('multiple', 'name'=>'product_img[]')) !!}
            </div>
            </div>
        </div>

        <!--Attribute1-->
        <div class="col-md-6">
            <div class="panel panel-default">
            <div class="panel-heading">Attribute 1</div>
                <div class="panel-body">
                <div class="form-group">       
                    {!! Form::label('Attribute Name') !!}
                    @if (isset($old_product))
                        {!! Form::text('attr1_name', $old_product->attr1_name,
                            array('class'=>'form-control')) !!}
                    @else
                        {!! Form::text('attr1_name', null,
                            array('class'=>'form-control')) !!}
                    @endif
                </div>
                <div class="form-group">     
                    {!! Form::label('Attribute Value') !!}
                    @if (isset($old_product))  
                        {!! Form::text('attr1_value', $old_product->attr1_value,
                            array('class'=>'form-control')) !!}
                    @else
                        {!! Form::text('attr1_value', null,
                            array('class'=>'form-control')) !!}
                    @endif
                </div>
                </div>
            </div>
        </div>

        <!--Attribute2-->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Attribute 2</div>
                <div class="panel-body">
                    <div class="form-group">       
                        {!! Form::label('Attribute Name') !!}
                        @if (isset($old_product))
                            {!! Form::text('attr2_name', $old_product->attr2_name,
                                array('class'=>'form-control')) !!}
                        @else
                            {!! Form::text('attr2_name', null,
                                array('class'=>'form-control')) !!}
                        @endif
                    </div>
                    <div class="form-group">       
                        {!! Form::label('Attribute Value') !!}
                        @if (isset($old_product))  
                            {!! Form::text('attr2_value', $old_product->attr2_value,
                                array('class'=>'form-control')) !!}
                        @else
                            {!! Form::text('attr2_value', null,
                                array('class'=>'form-control')) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!--Description-->
        <div class="form-group">       
            {!! Form::label('Product Description') !!}
            <textarea id="product_desc" name="product_desc">
            @if (isset($old_product))
                {{{ $old_product->description }}}
            @endif 
            </textarea>
        </div>

        <!--Specification-->
        <div class="form-group">       
            {!! Form::label('Product Specification') !!}
            <textarea id="product_spec" name="product_spec">
            @if (isset($old_product))
                {{{ $old_product->specification }}}
            @endif 
            </textarea>
        </div>

        <!--Buttons-->
        <div class="form-group text-center">
            @if (!isset($old_product)) 
                {!! Form::submit('Add Product', array (
                    'class'=>'btn btn-primary center-block',
                    'name'=>'add_button'
                )) !!}
            @else
                {!! Form::submit('Update Product', array (
                    'class'=>'btn btn-primary',
                    'name'=>'upd_button'
                )) !!}
                {!! Form::submit('Delete Product', array (
                    'class'=>'btn btn-danger',
                    'name'=>'del_button',
                    'onclick'=>'var del = confirm("Are you sure to delete?"); if (!del) return false;'
                )) !!}
            @endif
        </div>
    {!! Form::close() !!}
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
tinymce.init({
    skin: "light",
    plugins: "code,table, paste, autoresize",
    tools: "inserttable",
    height:300,
    autoresize_min_height:"300px",
    autoresize_max_height:"800px",
    statusbar: false,
    selector: "textarea",
    invalid_styles: {
            '*': 'height width'
    },
    invalid_elements: "width, height"
 });
</script>
@stop


