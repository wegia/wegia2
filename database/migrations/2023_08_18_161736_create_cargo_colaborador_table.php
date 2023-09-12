<?php

use App\Models\pessoa\Cargo;
use App\Models\pessoa\Colaborador;
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
        Schema::create('cargo_colaborador', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Colaborador::class);
            $table->foreignIdFor(Cargo::class);
            
            $table->date('inicio')->default(date("Y-m-d H:i:s"));
            $table->date('fim')->nullable();
            $table->boolean('e_cargo_atual')->default(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colab_tem_cargo');
    }
};
