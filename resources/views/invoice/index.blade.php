@extends('asidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: space-between;">
            <div class="pull-left">
                <h2>Invoice</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('invoices.create') }}"> Create New Invoice</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($invoices as $invoice)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $invoice->customer_name }}</td>
            <td>{{ $invoice->company_name }}</td>
            <td>{{ $invoice->grand_amount }}</td>
            <td>
                <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('invoices.show',$invoice->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('invoices.edit',$invoice->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $invoices->links() !!}
      
@endsection