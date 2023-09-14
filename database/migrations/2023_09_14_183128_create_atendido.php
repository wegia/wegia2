<?php

use App\Models\Pessoa;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\TipoAtendido;
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
        Schema::create('atendido', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 14)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->foreignIdFor(Pessoa::class);
            $table->foreignIdFor(TipoAtendido::class);
            $table->foreignIdFor(StatusAtendido::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendido');
    }
};
