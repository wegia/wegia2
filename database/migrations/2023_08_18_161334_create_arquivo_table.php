<?php

use App\Models\Pessoa;
use App\Models\pessoa\TipoArquivo;
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
        Schema::create('arquivo', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Pessoa::class);
            $table->foreignIdFor(TipoArquivo::class);

            $table->binary('binario_arquivo');
            $table->string('descricao', 200)->nullable();
            $table->date('data_cadastro')->default(date("Y-m-d H:i:s"))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arquivo');
    }
};
