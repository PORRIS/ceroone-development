<?php

namespace App\Http\Controllers;

use App\Datatables\ContactsDatatable;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Country;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'contacts' => Contact::paginate(),
            'countries' => Country::select('iso3 as id','nombre as name')->get()
        ]);
    }
    public function ContactDatatable(Request $request)
    {
        $records = Laratables::recordsOf(Contact::class, ContactsDatatable::class);
        return response()->json($records, 200);
    }

    public function store(ContactRequest $request)
    {
        $id_uniq = uniqid(time());
        $salt = "hash";
        $contact = new Contact();
        $contact->uuid = $id_uniq;
        $contact->name = $request->name;
        $contact->code = $id_uniq;
        $contact->email = $request->email;
        $contact->isperson = 1;
        $contact->createdAt = 1;
        $contact->updatedAt = 1;
        $contact->updatedHash = hash('sha256', date('Y-m-d').$salt);
        $contact->sync = 0;
        $contact->save();
        return redirect('contacts');
    }

    public function update(ContactRequest $request,$idContact)
    {
        $contact = Contact::query()->find($idContact);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->save();
        return redirect('contacts');
    }

    public function destroy(Request $request,$idContact)
    {
        $contact = Contact::query()->find($idContact);
        $contact->delete();
        return redirect('contacts');
    }
}
