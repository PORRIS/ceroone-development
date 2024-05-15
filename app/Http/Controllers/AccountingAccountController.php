<?php

namespace App\Http\Controllers;

use App\Datatables\AccountsDatatable;
use App\Http\Requests\AccountsRequest;
use App\Models\AccountingAccount;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountingAccountController extends Controller
{
    public function index()
    {
        return Inertia::render('AccountigAccounts/Index');
    }

    public function accountsDatatable(Request $request)
    {
        $records = Laratables::recordsOf(AccountingAccount::class, AccountsDatatable::class);
        return response()->json($records, 200);
    }

    public function store(AccountsRequest $request)
    {
        $id_uniq = uniqid(time());
        $contact = new AccountingAccount();
        $contact->uuid = $id_uniq;
        $contact->name = $request->name;
        $contact->type = $request->type;
        $contact->balance = $request->balance;
        $contact->accountNumber = $request->accountNumber;
        $contact->iban = $request->iban;
        $contact->swift = $request->swift;
        $contact->sync = 0;
        $contact->save();
        return redirect('accounts');
    }

    public function update(AccountsRequest $request,$idAccount)
    {
        $contact = AccountingAccount::query()->find($idAccount);
        $contact->name = $request->name;
        $contact->type = $request->type;
        $contact->balance = $request->balance;
        $contact->accountNumber = $request->accountNumber;
        $contact->iban = $request->iban;
        $contact->swift = $request->swift;
        $contact->save();
        return redirect('accounts');
    }

    public function destroy(Request $request,$idAccount)
    {
        $contact = AccountingAccount::query()->find($idAccount);
        $contact->delete();
        return redirect('accounts');
    }
}
