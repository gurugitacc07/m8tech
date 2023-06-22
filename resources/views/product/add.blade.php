@extends('asidebar')
  
@section('content')
<div class="row">
    <div class="col-lg-12" style="display: flex; justify-content: space-between;">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select class="form-select" aria-label="multiple select example" name="category_id" id="sub_category_id">
                    <option selected>Open this select menu</option>
                    @foreach($category as $val)
                    <option value="{{$val->id}}">{{$val->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sub Category:</strong>
                <select class="form-select" aria-label="multiple select example" name="sub_category_id" id="sub_category_id">
                    <option value="">Open this select menu</option>
                    @foreach($subcategory as $subval)
                    <option value="{{$subval->id}}">{{$subval->sub_category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 1%;">
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
        </div>
    </div>
   
</form>
@endsection