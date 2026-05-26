<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('processos', function (Blueprint $table) {
            if (!Schema::hasColumn('processos', 'livro_id')) {
                $table->foreignId('livro_id')->nullable()->after('data_devolucao');
            }
            $table->foreign('livro_id')->references('id')->on('livros')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('processos', function (Blueprint $table) {
            $table->dropForeign(['livro_id']);
            if (Schema::hasColumn('processos', 'livro_id')) {
                $table->dropColumn('livro_id');
            }
        });
    }
};
