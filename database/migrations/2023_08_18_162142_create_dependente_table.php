<?php

use App\Models\Pessoa;
use App\Models\pessoa\Funcionario;
use App\Models\pessoa\utils\Parentesco;
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
        Schema::create('dependente', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignIdFor(Funcionario::class);
            $table->foreignIdFor(Pessoa::class);
            $table->foreignIdFor(Parentesco::class);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependente');
    }
};
