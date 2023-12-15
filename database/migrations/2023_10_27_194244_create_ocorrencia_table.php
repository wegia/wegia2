<?php

use App\Models\pessoa\Atendido;
use App\Models\pessoa\TipoOcorrencia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//Esta faltando a tabela de Usuários!!!!
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Atendido::class);
            $table->foreignIdFor(TipoOcorrencia::class);
            $table->date('data');
            $table->string('descricao', 2000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocorrencia');
    }
};
