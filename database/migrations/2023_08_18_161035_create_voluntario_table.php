<?php

use App\Models\rh\Colaborador;
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
            $table->string('disponib_semana', 45)->nullable();
            $table->string('disponib_horas', 45)->nullable();
            $table->string('descricao', 100)->nullable();

            $table->timestamps();

            //setting keys
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
