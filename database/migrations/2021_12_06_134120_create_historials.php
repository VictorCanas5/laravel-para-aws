<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('estado',100);
            $table->string('descripcion',255);
            
            $table->foreignId('sensor_id')
            ->nullable()
            ->constrained('sensors')
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historials');
    }
}
