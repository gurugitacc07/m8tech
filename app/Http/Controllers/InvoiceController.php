<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Invoiceproduct;
class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::latest()->paginate(5);
        
        return view('invoice.index',compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $products = Product::get();
        return view('invoice.add')->with(['products'=>$products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'product_id' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);


        $invoice = new Invoice();

        $invoice->customer_name = $request->customer_name;
        $invoice->phone = $request->phone;
        $invoice->company_name = $request->company_name;
        $invoice->grand_amount = $request->grandtotal;
        $invoice->save();
        
        
        for ($i=0; $i < count($request->product_id); $i++) { 

            $invoice_product = new Invoiceproduct();

            $invoice_product->invoice_id = $invoice->id;
            $invoice_product->product_id = $request->product_id[$i];
            $invoice_product->rate = $request->rate[$i];
            $invoice_product->qty = $request->qty[$i];
            $invoice_product->grand_amount = $request->actualamount[$i];
            $invoice_product->save();
        }


        return redirect()->route('invoices.index')
                        ->with('success','Booking created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice_products = Invoiceproduct::where('invoice_id',$invoice->id)
                            ->leftjoin('products','products.id','=','invoiceproducts.product_id')
                            ->get();
        return view('invoice.show',compact('invoice','invoice_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $products = Product::get();
        $invoice_products = Invoiceproduct::where('invoice_id',$invoice->id)
                            ->leftjoin('products','products.id','=','invoiceproducts.product_id')
                            ->get();

       

        return view('invoice.edit',compact('invoice','products','invoice_products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'product_id' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);
// dd($request->id);
        $oldrows = Invoiceproduct::where('invoice_id',$request->id)
                    ->whereNotIn('id',$request->pid)
                    ->get();
        foreach ($oldrows as $value) {
            Invoiceproduct::where('id',$value->id)->delete();
        }

        $update = Invoice::where('id',$request->id)->update([
                    'customer_name'=>$request->customer_name,
                    'phone'=>$request->phone,
                    'company_name'=>$request->company_name,
                    'grand_amount'=>$request->grandtotal,
                ]);

        if ($request->pid == null) {
            for ($i=0; $i < count($request->product_id); $i++) { 

                $invoice_product = new Invoiceproduct();

                $invoice_product->invoice_id = $request->id;
                $invoice_product->product_id = $request->product_id[$i];
                $invoice_product->rate = $request->rate[$i];
                $invoice_product->qty = $request->qty[$i];
                $invoice_product->grand_amount = $request->actualamount[$i];
                $invoice_product->save();
            }
        }
        else
        {
            for ($i=0; $i < count($request->product_id); $i++) { 
                $book_update = Invoiceproduct::where('invoice_id',$request->id)->where('id',$request->pid)->update([
                    'invoice_id'=>$request->id,
                    'product_id'=>$request->product_id[$i],
                    'rate'=>$request->rate[$i],
                    'qty'=>$request->qty[$i],
                    'grand_amount'=>$request->actualamount[$i],
                ]);
            }
        }
        

        return redirect()->route('invoices.index')
                        ->with('success','Booking updated successfully');
    }
}



        