<?php

namespace App\Http\Controllers;

use App\Services\SynchronizerService;
use Illuminate\Http\Request;

class SynchronizerController extends Controller
{
    private SynchronizerService $synchronizer;

    public function __construct(SynchronizerService $synchronizer )
    {
        $this->synchronizer = $synchronizer;
    }
    public function syncContacts()
    {
        $response = $this->synchronizer->syncContacts();
        return response()->json($response);
    }
    public function syncInvoices()
    {
        $response = $this->synchronizer->syncInvoices();
        return response()->json($response);
    }

    public function syncAccounts()
    {
        $response = $this->synchronizer->syncaccounts();
        return response()->json($response);
    }

}
