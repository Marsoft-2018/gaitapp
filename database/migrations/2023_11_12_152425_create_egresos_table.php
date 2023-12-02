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
            $table->unsignedBigInteger("id_participante");
            $table->date("fecha");
            $table->decimal('valor', 10, 2);
            $table->unsignedBigInteger("id_concepto");
            $table->string("elaborado")->nullable();
            $table->string("aprobado")->nullable();
            $table->string("contabilizado")->nullable();  
            $table->string("estado");      
            $table->string("forma_pago",2);              
            $table->foreign("id_concepto")->references('id')->on('conceptos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_participante')->references('id')->on('participantes')->onDelete('cascade');
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
