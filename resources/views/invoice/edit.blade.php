@extends('asidebar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: space-between;">
            <div class="pull-left">
                <h2>Edit Invoice</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Back</a>
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
  
    <form action="{{ route('invoices.update',$invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Name:</strong>
                    <input type="text" name="customer_name" value="" class="form-control" placeholder="Customer Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Phone:</strong>
                    <input type="text" name="phone" value="" pattern="[0-9]*" class="form-control phone" placeholder="Customer Phone">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" value="" class="form-control" placeholder="Company Name">
                </div>
            </div>

            <table id="myTable" class=" table order-list">
                <thead>
                    <tr>
                        <td>Product Name</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-4">
                            <div class="form-group">
                                <select class="form-select" aria-label="multiple select example" name="product_id[]" id="product_id1" data-id="1">
                                    <option selected>Open this select menu</option>
                                    @foreach($products as $val)
                                    <option value="{{$val->id}}">{{$val->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="col-sm-4">
                            <input type="number" name="rate[]" id="rate1" data-id="1" class="form-control rate"/>
                        </td>
                        <td class="col-sm-3">
                            <input type="number" name="qty[]" id="qty1" data-id="1" class="form-control qty" value="0"/>
                        </td>
                        <td class="col-sm-3">
                            <input type="number" name="actualamount[]" id="actualamount1" data-id="1" class="form-control _actualamount" value="0"/>
                        </td>
                        <td class="col-sm-2"><a class="deleteRow" data-id="1"></a>

                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align: left;">
                            <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
            </table>


            <input type="text" name="grandtotal" id="grandtotal" value="0" class="form-control"/>


            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 1%;">
              <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
            </div>
        </div>
   
    </form>
@endsection

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
        $("#addrow").on("click", function () {
        var rowCount = $(".rate").length+1;
        alert(rowCount); 
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td class="col-sm-4"><div class="form-group"><select class="form-select" aria-label="multiple select example" name="product_id[]" id="product_id'+rowCount+'" data-id="'+rowCount+'"><option selected>Open this select menu</option>@foreach($products as $val)<option value="{{$val->id}}">{{$val->product_name}}</option>@endforeach</select></div></td>';
            cols += '<td><input type="number" class="form-control rate" id="rate'+rowCount+'" data-id="'+rowCount+'" name="rate[]"/></td>';
            cols += '<td><input type="number" class="form-control qty" id="qty'+rowCount+'" data-id="'+rowCount+'" name="qty[]" value="0"/></td>';

            cols += '<td><input type="number" class="form-control _actualamount" id="actualamount'+rowCount+'" data-id="'+rowCount+'" name="actualamount[]" value="0"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " data-id="'+rowCount+'" value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });


    });

   


$(document).on('change', '.rate,.qty', function() {
    var i = $(this).attr("data-id");
    alert(i);
    var quantity = $("#qty" + i).val();
    alert('quantity'+quantity);
    var org_price = $("#rate" + i).val();
    alert('org_price'+org_price);
    var qtyprice = quantity * org_price;
    alert('qtyprice'+qtyprice);
    $("#actualamount" + i).val(qtyprice); // this is _actualamount
    bottom_calculation_single_item_based();
});


var total = 0;
function bottom_calculation_single_item_based(){
    for(var i = 0; i < $("._actualamount").length;i++){
        var checkValue = parseFloat($("._actualamount").eq(i).val());
        alert('checkValue'+checkValue);
        if(checkValue){
           total = parseFloat(total) + parseFloat(checkValue);
        }
        
    }
    // var total = total;

    alert('total'+total);
    $("#grandtotal").val(total);
}
</script>