<?php

use App\Enums\LivroStatus;
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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100)->nullable(false);
            $table->text('descricao')->nullable(true);
            $table->string('autor', 100)->nullable(false);
            $table->enum('status', array_column(LivroStatus::cases(), 'value'))->nullable(false)->default(LivroStatus::DISPONIVEL->value);
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
