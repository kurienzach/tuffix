@extends('layouts.admin_template')

@section('content')
<div class="page-header">
    <h1>Categories</h1>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

    <h2 style="display: inline-block">Current Categories</h2>
    <a href="{{ url('/admin/categories/addnew') }}" style="margin-left: 20px; margin-bottom: 10px;" class="btn btn-success">Add Category</a>

    <p class="text-muted">Click on a Category to edit</p>
    <br>
    <ul>
        @if (empty($categories))
            <p>No Categories Added yet</p>
        @else
            @foreach ($categories->where('level', '1') as $category)
                <li>
                <a href="{{ url('/admin/categories/' . $category->id) }}">{{ $category->name }}</a>
                    <ul>
                        @foreach ($categories->where('parent_id', $category->id) as $sub)
                        <li><a href="{{ url('/admin/categories/' . $sub->id) }}">{{ $sub->name }}</a>
                            <ul>
                                @foreach ($categories->where('parent_id', $sub->id) as $subsub)
                                <li><a href="{{ url('/admin/categories/' . $subsub->id) }}">{{ $subsub->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>

            @endforeach
        @endif

    </ul>
    </div>
</div>
@stop

