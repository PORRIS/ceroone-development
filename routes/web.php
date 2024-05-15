<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AccountingAccountController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return Inertia::render('CeroOne');
})->name('Ceroone');

Route::resource('contacts', ContactController::class);
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('datatable/contacts/{start?}/{end?}', [ContactController::class, 'ContactDatatable'])->name('contacts.datatable');

Route::resource('invoices', InvoiceController::class);
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('datatable/invoices/{start?}/{end?}', [InvoiceController::class, 'Datatable'])->name('invoices.datatable');

Route::resource('accounts', AccountingAccountController::class);
Route::get('/accounts', [AccountingAccountController::class, 'index'])->name('accounts.index');
Route::get('datatable/accounts/{start?}/{end?}', [AccountingAccountController::class, 'accountsDatatable'])->name('accounts.datatable');


require __DIR__.'/synchronizer.php';
