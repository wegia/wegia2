<?php

use App\Models\Pessoa;
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
            $table->foreignIdFor(Pessoa::class);
            
            $table->date('admissao')->default(date("Y-m-d H:i:s"))->nullable();
            $table->enum('situacao', ['a', 'i'])->default('a');
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
