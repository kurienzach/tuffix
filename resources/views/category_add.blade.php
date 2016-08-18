@extends('layouts.admin_template')

@section('content')
<div class="page-header">
    @if (!isset($old_category)) 
        <h1>Add Category</h1>
    @else
        <h1>Edit Category</h1>
    @endif
</div>

<a href="{{ url('/admin/categories') }}" class="btn btn-default" style="margin-bottom: 10px">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
Back to Categories
</a>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
    {!! Form::open(array('url'=>'/admin/categories/modify', 'files'=> true)) !!}
       
        <!-- Error -->
        @if ($errors->has())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
            </div>
        @endif

        <!-- ID -->
        @if (isset($old_category)) 
            {!! Form::hidden('id', $old_category->id) !!}
        @endif

        <!-- Category Name -->
        <div class="form-group">
            {!! Form::label('Category Name') !!}
            @if (!isset($old_category)) 
                {!! Form::text('name',null,
                    array('required', 'class'=>'form-control')
                ) !!}
            @else
                {!! Form::text('name', $old_category->name,
                    array('required', 'class'=>'form-control')
                ) !!}
            @endif
        </div>

        <!-- Category Parent Category ID -->
        <div class="form-group">
            {!! Form::label('Parent Category') !!}
            <select id="select-parent-cat" name="parent_id" class="form-control">
                <option select value="0">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            @if (isset($old_category))
                <script>
                    document.getElementById('select-parent-cat').value = {{ $old_category->parent_id }};
                </script>
            @endif
        </div>

        <!-- Category Description -->
        <div class="form-group">       
            {!! Form::label('Category Description') !!}
            <textarea id="description" name="description" class="form-control" rows="3">@if (isset($old_category)){{{ $old_category->description }}}@endif</textarea>
        </div>

        <!-- Category Image -->
        <div class="form-group">
            <h5>Category Image</h5>
            <div class="row">
            <div class="col-md-6">
                {!! Form::label('Current Image') !!}<br>    
                @if (!isset($old_category) || empty($old_category->img_url) ) 
                    <img class="thumbnail" src="{{ asset('/img/default.png') }}">
                @else
                    <img class="thumbnail" src="{{ asset('/img/categoryimg') . "/" . $old_category->img_url }}">
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('Upload Image') !!}
                {!! Form::file('img_url') !!}
            </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="form-group text-center">
            @if (!isset($old_category)) 
                {!! Form::submit('Add Category', array (
                    'class'=>'btn btn-primary center-block',
                    'name'=>'add_button'
                )) !!}
            @else
                {!! Form::submit('Update Category', array (
                    'class'=>'btn btn-primary',
                    'name'=>'upd_button'
                )) !!}
                {!! Form::submit('Delete Category', array (
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
