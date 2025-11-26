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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->enum('sexo', ['masculino', 'feminino', 'outro'])->nullable();
            $table->decimal('busto', 5, 2)->nullable()->comment('Medida em cm');
            $table->decimal('cintura', 5, 2)->nullable()->comment('Medida em cm');
            $table->decimal('quadril', 5, 2)->nullable()->comment('Medida em cm');
            $table->decimal('altura', 5, 2)->nullable()->comment('Medida em cm');
            $table->decimal('ombro', 5, 2)->nullable()->comment('Medida em cm');
            $table->decimal('comprimento_vestido', 5, 2)->nullable()->comment('Medida em cm');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
