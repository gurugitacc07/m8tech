@extends('asidebar')
  
@section('content')
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: space-between;">
            <div class="pull-left">
                <h2>Invoice Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer Name:</strong>
                {{ $invoice->customer_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company Name:</strong>
                {{ $invoice->company_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $invoice->grand_amount }}
            </div>
        </div>
    </div>
@endsection