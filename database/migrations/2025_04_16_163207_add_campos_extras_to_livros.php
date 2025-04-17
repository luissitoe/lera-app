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
        Schema::table('livros', function (Blueprint $table) {
            $table->float('peso')->nullable();
            $table->string('dimensoes')->nullable();
            $table->integer('quantidade')->nullable();
            $table->string('arquivo')->nullable(); // arquivo digital
            $table->string('narrador')->nullable(); // narrador do audiobook
            $table->string('tempo_duracao')->nullable(); // duração ex: 02:10:00
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn([
                'peso',
                'dimensoes',
                'quantidade',
                'arquivo',
                'narrador',
                'tempo_duracao',
            ]);
        });
    }
};
