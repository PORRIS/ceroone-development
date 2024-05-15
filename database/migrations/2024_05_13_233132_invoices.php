<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cro_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('contact')->nullable();
            $table->string('contactName')->nullable();
            $table->string('desc')->nullable();
            $table->string('date')->nullable();
            $table->string('dueDate')->nullable();
            $table->json('multipledueDate')->nullable();
            $table->string('forecastDate')->nullable();
            $table->string('notes')->nullable();
            $table->json('tags')->nullable();
            $table->json('products')->nullable();
            $table->string('tax')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount')->nullable();
            $table->string('total')->nullable();
            $table->string('language')->nullable();
            $table->string('status')->nullable();
            $table->json('customFields')->nullable();
            $table->string('docNumber')->nullable();
            $table->string('currency')->nullable();
            $table->string('currencyChange')->nullable();
            $table->string('paymentMethodId')->nullable();
            $table->string('paymentsTotal')->nullable();
            $table->string('paymentsPending')->nullable();
            $table->string('paymentsRefunds')->nullable();
            $table->string('shipping')->nullable();
            $table->json('from')->nullable();
            $table->integer('sync');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cro_invoices');
    }
};
