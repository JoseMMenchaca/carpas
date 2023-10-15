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
        Schema::create('variedad_hortalizas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hortaliza_id')->constrained();
            $table->string('codigo')->unique();
            $table->string('variedad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variedad_hortalizas');
    }
};
