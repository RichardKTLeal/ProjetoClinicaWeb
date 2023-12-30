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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(1);    
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreignId('paciente_id')->constrained();
            $table->foreignId('servico_id')->constrained();
            $table->enum('status', ['aberta', 'concluido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
