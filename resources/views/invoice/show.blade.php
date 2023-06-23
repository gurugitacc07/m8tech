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

        <table id="myTable" class=" table order-list">
                <thead>
                    <tr>
                        <td>Product Name</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                        <td>Amount</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                    ?>
                    @foreach($invoice_products as $value)
                    <tr>
                        <td >
                            <div class="form-group">
                                <input type="text" name="prd[]" id="prd{{$i}}" data-id="{{$i}}" class="form-control prd" value="{{$value->product_name}}" readonly />
                            </div>
                        </td>
                        <td >
                            <input type="text" name="rate[]" id="rate{{$i}}" data-id="{{$i}}" class="form-control rate" value="{{$value->rate}}" readonly />
                        </td>
                        <td >
                            <input type="text" name="qty[]" id="qty{{$i}}" data-id="{{$i}}" class="form-control qty" value="{{$value->qty}}" readonly />
                        </td>
                        <td >
                            <input type="text" name="actualamount[]" id="actualamount{{$i}}" data-id="{{$i}}" class="form-control _actualamount" value="{{$value->grand_amount}}" readonly />
                        </td>
                       
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
            </table>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grand Total:</strong>
                {{ $invoice->grand_amount }}
            </div>
        </div>
            <input type="hidden" name="grandtotal" id="grandtotal" value="{{$invoice->grand_amount}}" class="form-control"/>
    </div>
@endsection