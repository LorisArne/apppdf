<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurasTable extends Migration
{
    public function up()
    {
        Schema::create('proceduras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firma1')->nullable();
            $table->string('firma2')->nullable();
            $table->string('firma3')->nullable();
            $table->string('firma4')->nullable();
            $table->integer('numero_firme')->unsigned()->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('proceduras');
    }
}
