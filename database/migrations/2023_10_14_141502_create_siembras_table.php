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
        Schema::create('siembras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrega_id')->constrained(
                table: 'entrega_carpas',
            );
            $table->date('fecha_siembra');
            $table->string('dimension');
            $table->foreignId('variedad_id')->constrained(
                table: 'variedad_hortalizas',
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siembras');
    }
};
