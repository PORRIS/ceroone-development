<?php

namespace App\Http\Controllers;

use App\Datatables\ContactsDatatable;
use App\Models\Contact;
use App\Models\Country;
use App\Models\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Invoices/Index', [
            'contacts' => Contact::paginate(),
            'countries' => Country::select('iso3 as id','nombre as name')->get()
        ]);
    }


}
