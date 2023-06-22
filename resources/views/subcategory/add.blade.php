@extends('asidebar')
@section('content')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('subcategory')}}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('subcategory_store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Subcategory Name:</strong>
                        <input type="text" name="sub_category_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($category as $cate)
                            <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary  mt-5">Submit</button>
            </div>
        </form>
    </div>
    @endsection
