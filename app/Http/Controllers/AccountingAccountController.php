<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountingAccountController extends Controller
{
    public function index()
    {
        return Inertia::render('AccountigAccounts/Index', [
            'users' => User::paginate()
        ]);
    }
}
