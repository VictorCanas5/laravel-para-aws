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
            
            $table->string('fecha_y_hora');
            $table->string('valor',100);
            $table->string('tipo');
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
