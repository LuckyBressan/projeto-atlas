<?php

use App\Enums\ProcessoStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('observacao')->nullable(true);
            $table
                ->enum('status', array_column(ProcessoStatus::cases(), 'value'))
                ->nullable(false)
                ->default(ProcessoStatus::ABERTO);
            $table->date('data_retirada')->nullable(false);
            $table->date('data_prevista')->nullable(false);
            $table->date('data_devolucao')->nullable(true);
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
