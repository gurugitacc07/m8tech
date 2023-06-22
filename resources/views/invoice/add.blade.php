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
                    <strong>Customer Name:</strong>
                    <input type="text" name="customer_name" value="" class="form-control" placeholder="Customer Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" value="" class="form-control" placeholder="Company Name">
                </div>
            </div>
            @foreach ($Products as $value)
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <input type="checkbox" value="{{$value->id}}" name="product_id[]">
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="number" name="product_name[]" class="form-control" value="{{ $product->product_name }}" required>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="number" name="amount[]" class="form-control" value="{{ $product->amount }}" required>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" name="qty[]" class="form-control" value="0" required>
                </div>
            </div>
            @endforeach

            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 1%;">
              <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
            </div>
        </div>
   
</form>
@endsection