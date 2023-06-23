<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
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
        dd($request->all());
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'product_id' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);

        $grand_amount = 

        $invoice = new Invoice();

        $invoice->customer_name = $request->customer_name;
        $invoice->phone = $request->phone;
        $invoice->company_name = $request->company_name;
        $invoice->grand_amount = $grand_amount;
        $invoice->bike_color = $request->bike_color;
        $invoice->bike_model = $request->bike_model;
        $invoice->service_options = json_encode($request->services);
        $invoice->note = $request->note;
        $invoice->save();
        
        // $services = Service::whereIn('id',$request->services)->get()->toArray();
        // $mailData = [
        //     "name" => auth()->user()->name,
        //     "service_date" => $request->service_date,
        //     "service_details" => $services,
        //     "note"=>$request->note
        // ];
        // $admin = User::where('id',$request->service_center_id)->first();
        // Mail::to($admin->email)->send(new AdminMail($mailData));

        return redirect()->route('invoivces')
                        ->with('success','Booking created successfully.');
    }
}
