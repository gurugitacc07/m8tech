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
}
