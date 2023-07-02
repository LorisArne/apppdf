<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomeProceduraDocumentoDaFirmareToProceduras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proceduras', function (Blueprint $table) {
            $table->string('nome_procedura');
            $table->string('documento_da_firmare')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proceduras', function (Blueprint $table) {
            $table->dropColumn('nome_procedura');
            $table->dropColumn('documento_da_firmare');
        });
    }
}
