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
        Schema::create('roupas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unique();
            $table->string('tipo');
            $table->string('tamanho');
            $table->string('cor')->nullable();
            $table->string('material')->nullable();
            $table->string('marca')->nullable();
            $table->decimal('preco', 10, 2)->nullable();
            $table->enum('estado', ['disponivel', 'alugada', 'manutencao'])->default('disponivel');
            $table->text('observacoes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roupas');
    }
};
