<?php


use App\Http\Controllers\SynchronizerController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/synchronize'], function () {
    Route::get('/contacts', [SynchronizerController::class, 'syncContacts'])->name('synchronize.contacts');
    Route::get('/invoices', [SynchronizerController::class, 'syncInvoices'])->name('synchronize.invoices');
    Route::get('/accounts', [SynchronizerController::class, 'syncAccounts'])->name('synchronize.accounts');
});
