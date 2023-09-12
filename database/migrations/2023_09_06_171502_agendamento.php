<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('services_id'); // Corrigido para 'services_id'
            $table->date('data');
            $table->time('horario');
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
};