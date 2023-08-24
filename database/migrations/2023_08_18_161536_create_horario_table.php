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
    public $dias_semana = ['SEG', 'TER', 'QUA','QUI', 'SEX', 'SAB', 'DOM'];

    public function up(): void
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Colaborador::class);
            $table->time('entrada', $precision = 0);
            $table->time('saida', $precision = 0);
            $table->date('inicio');
            $table->date('fim')->nullable();
            $table->enum('dia_semana',$this->dias_semana);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario');
    }
};
