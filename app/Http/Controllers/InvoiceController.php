<?php

namespace App\Http\Controllers;

use App\Datatables\InvoicesDatatable;
use App\Http\Requests\InvoicesRequest;
use App\Models\Contact;
use App\Models\Invoice;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Invoices/Index');
    }
    public function Datatable(Request $request)
    {
        $records = Laratables::recordsOf(Invoice::class, InvoicesDatatable::class);
        return response()->json($records, 200);
    }

    public function store(InvoicesRequest $request)
    {
        $id_uniq = uniqid(time());
        $invoice = new Invoice();
        $invoice->uuid = $id_uniq;
        $invoice->contact = $id_uniq;
        $invoice->contactName = $request->contactName;
        $invoice->notes = $request->notes;
        $invoice->subtotal =$request->subtotal;
        $invoice->total = $request->total;
        $invoice->sync = 0;
        $invoice->save();
        return redirect('invoices');
    }

    public function update(InvoicesRequest $request,$idInvoice)
    {
        $invoice = Invoice::query()->find($idInvoice);
        $invoice->contactName = $request->contactName;
        $invoice->subtotal =$request->subtotal;
        $invoice->notes = $request->notes;
        $invoice->total = $request->total;
        $invoice->save();
        return redirect('invoices');
    }

    public function destroy(Request $request,$idInvoice)
    {
        $invoice = Invoice::query()->find($idInvoice);
        $invoice->delete();
        return redirect('invoices');
    }


}
