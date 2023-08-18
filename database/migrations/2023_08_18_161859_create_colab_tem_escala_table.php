<?php

use App\Models\rh\Colaborador;
use App\Models\rh\Escala;
use App\Models\rh\TipoEscala;
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
        Schema::create('colab_tem_escala', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Colaborador::class);
            $table->foreignIdFor(Escala::class);
            $table->foreignIdFor(TipoEscala::class);
            $table->date('inicio')->default(date("Y-m-d H:i:s"));
            $table->date('fim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colab_tem_escala');
    }
};
