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
        Schema::create('cro_control_synchronization', function (Blueprint $table) {
            $table->id();
            $table->string('prefijo_url');
            $table->string('nombre');
            $table->integer('paginas');
            $table->integer('registros')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cro_control_synchronization');

    }
};
