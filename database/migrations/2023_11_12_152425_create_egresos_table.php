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
        Schema::create('egresos', function (Blueprint $table) {
            $table->id();
            $table->string("consecutivo",4)->unique();
            $table->string("id_participante");
            $table->date("fecha");
            $table->decimal('valor', 10, 2);
            $table->string("id_concepto");
            $table->string("elaborado");
            $table->string("aprobado");
            $table->string("contabilizado");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egresos');
    }
};
