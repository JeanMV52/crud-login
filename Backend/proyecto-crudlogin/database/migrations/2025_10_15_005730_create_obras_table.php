<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    public function up()
{
    Schema::create('obras', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descripcion');
        $table->string('imagen')->nullable();
        $table->json('tags')->nullable();
        $table->string('estilo')->nullable();
        $table->string('fandom')->nullable();
        
        // Clave foránea
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
        
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('obras');
    }
}

