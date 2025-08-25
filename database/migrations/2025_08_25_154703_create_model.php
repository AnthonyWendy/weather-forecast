<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('cidade')->nullable();
            $table->string('pais')->nullable();
            $table->integer('temperatura')->nullable();
            $table->string('descricao')->nullable();
            $table->string('icone')->nullable();
            $table->integer('umidade')->nullable();
            $table->integer('vento')->nullable();
            $table->integer('pressao')->nullable();
            $table->integer('sensacao')->nullable();
            $table->integer('cloudcover')->nullable();
            $table->integer('uv_index')->nullable();
            $table->string('sunrise')->nullable();
            $table->string('sunset')->nullable();
            $table->json('air_quality')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
