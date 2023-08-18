<?php

use App\Models\rh\Funcionario;
use App\Models\rh\TipoRemuneracao;
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
        Schema::create('remuneracao', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Funcionario::class);
            $table->foreignIdFor(TipoRemuneracao::class);
            $table->decimal('valor', $precision=8, 2);
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
        Schema::dropIfExists('remuneracao');
    }
};
