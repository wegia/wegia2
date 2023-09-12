<?php

use App\Models\pessoa\Colaborador;
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
        Schema::create('voluntario', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Colaborador::class);
            $table->string('disponibilidade_semanal', 45)->nullable();
            $table->string('disponibilidade_horas', 45)->nullable();
            $table->string('descricao', 100)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntario');
    }
};
