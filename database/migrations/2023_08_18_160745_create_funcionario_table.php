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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Colaborador::class);

            $table->string('pis', 20)->nullable();
            $table->string('ctps', 150)->nullable();
            $table->char('ctps_uf', 2)->nullable();
            $table->string('eleitor_numero', 15)->nullable();
            $table->string('eleitor_zona', 4)->nullable();
            $table->string('eleitor_secao', 5)->nullable();
            $table->string('reserv_numero', 20)->nullable();
            $table->string('reserv_orgao', 10)->nullable();
            $table->string('reserv_serie', 5)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
