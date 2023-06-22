@extends('asidebar')
@section('content')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Category List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('subcategory_add')}}"> Create Subcategory</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Category Name</th>

                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            	@php
            	$i=1;
            	@endphp
            	@foreach($listdata as $val)
            	<tr>
            		<td>{{$i}}</td>
            		<td>{{$val->sub_category_name}}</td>
            		<td><a class="btn btn-primary" href="{{ route('subcategory_edit',$val->id) }}">Edit</a>
            		<a class="btn btn-primary" href="{{ route('subcategory_delete',$val->id) }}">Delete</a></td>

            	</tr>
                @php
            	$i++;
            	@endphp
               @endforeach


    </div>
@endsection
