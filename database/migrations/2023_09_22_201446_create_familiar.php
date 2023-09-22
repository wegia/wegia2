<?php

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
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
        Schema::create('familiar', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pessoa::class);
            $table->foreignIdFor(Parentesco::class);
            $table->foreignIdFor(Atendido::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar');
    }
};
