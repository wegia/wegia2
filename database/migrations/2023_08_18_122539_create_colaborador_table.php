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
        Schema::create('colaborador', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('login', 255);
            $table->string('senha', 255);
            $table->unsignedBigInteger('pessoa_id');
            $table->date('admissao')->default(date("Y-m-d H:i:s"))->nullable();
            $table->enum('situacao', ['a', 'i'])->default('a');
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('rg_orgao', 20)->nullable();
            $table->date('rg_expedicao')->nullable();
            $table->date('rg_vencimento', 5)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
