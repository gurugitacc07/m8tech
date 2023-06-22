<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::latest()->paginate(5);
        
        return view('booking.index',compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
