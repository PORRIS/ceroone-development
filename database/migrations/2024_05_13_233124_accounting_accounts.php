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
        Schema::create('cro_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('balance')->nullable();
            $table->bigInteger('accountNumber')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->integer('sync');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cro_accounts');
    }
};
