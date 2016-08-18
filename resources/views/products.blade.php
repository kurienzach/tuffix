@extends('layouts.admin_template')

@section('head')
<link href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#product_table').DataTable();
        $("#product_table tbody").on( 'click', 'tr', function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
@stop

@section('content')
<div class="page-header">
    <h1>Products</h1>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">

    <h2 style="display: inline-block">Current Products</h2>
    <a href="{{ url('/admin/products/addnew') }}" style="margin-left: 20px; margin-bottom: 10px;" class="btn btn-success">Add Product</a>

    <p class="text-muted">Click on a Category to edit</p>
    <br>
        @if (empty($products))
            <p>No Products Added yet</p>
        @else
            <table id="product_table" class="product_table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>ID</th> 
                    <th>Name</th>
                    <th>Product Category</th> 
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr class="clickable-row" data-href="{{ url('/admin/products/' . $product->id) }}">
                        @if (!empty($product->images()->first()->img_url))
                            <td><img src="{{ asset('/img/productimg') . '/' . $product->images()->first()->img_url }}"></img></td>
                        @else
                            <td><img src="{{ asset('/img/default.png') }}"></img></td>
                        @endif
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ App\Category::find($product->category_id)->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@stop
