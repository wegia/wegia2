<?php

use App\Models\pessoa\Colaborador;
use App\Models\pessoa\Escala;
use App\Models\pessoa\TipoEscala;
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
        Schema::create('colaborador_escala', function (Blueprint $table) {
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
        Schema::dropIfExists('colaborador_escala');
    }
};
