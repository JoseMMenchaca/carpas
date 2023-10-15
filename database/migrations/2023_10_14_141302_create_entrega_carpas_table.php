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
        Schema::create('entrega_carpas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carpa_id')->constrained();
            $table->foreignId('comunario_id')->constrained();
            $table->dateTime('fecha_entrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_carpas');
    }
};
