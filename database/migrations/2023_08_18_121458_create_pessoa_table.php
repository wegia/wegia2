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
        Schema::create('pessoa', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('nome', 100);
            $table->char('genero', 1)->nullable();
            $table->date('nascimento')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->binary('foto')->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('rg_orgao', 20)->nullable();
            $table->date('rg_data_expedicao')->nullable();
            $table->date('rg_data_vencimento', 5)->nullable();
            $table->string('nome_mae', 100)->nullable();
            $table->string('nome_pai', 100)->nullable();
            $table->char('tipo_sangue', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa');
    }
};
