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
        Schema::create('cro_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('customId')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('vatnumber')->nullable();
            $table->string('tradeName')->nullable();
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('type')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->string('groupId')->nullable();
            $table->json('clientRecord')->nullable();
            $table->json('supplierRecord')->nullable();
            $table->string('billAddress')->nullable();
            $table->string('billCity')->nullable();
            $table->integer('billPostalCode')->nullable();
            $table->string('billProvince')->nullable();
            $table->string('billCountryCode')->nullable();
            $table->string('billInfo')->nullable();
            $table->json('customFields')->nullable();
            $table->json('defaults')->nullable();
            $table->json('socialNetworks')->nullable();
            $table->json('tags')->nullable();
            $table->json('notes')->nullable();
            $table->json('contactPersons')->nullable();
            $table->json('shippingAddresses')->nullable();
            $table->integer('isperson');
            $table->integer('createdAt');
            $table->integer('updatedAt');
            $table->string('updatedHash');
            $table->integer('sync');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cro_contacts');
    }
};
