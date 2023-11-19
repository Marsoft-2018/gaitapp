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
        Schema::create('egreso_detalles', function (Blueprint $table) {
            $table->id();
            $table->string("id_egreso");
            $table->string("id_cuenta");
            $table->decimal("debito",10,2)->nullable();            
            $table->decimal("credito",10,2)->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egreso_detalles');
    }
};
