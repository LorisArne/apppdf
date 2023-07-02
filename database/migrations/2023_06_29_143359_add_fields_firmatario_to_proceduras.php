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
        Schema::table('proceduras', function (Blueprint $table) {
            $table->string('firma5')->after('firma4')->nullable();
            $table->string('firmatario1')->after('firma5')->nullable();
            $table->string('firmatario2')->after('firmatario1')->nullable();
            $table->string('firmatario3')->after('firmatario2')->nullable();
            $table->string('firmatario4')->after('firmatario3')->nullable();
            $table->string('firmatario5')->after('firmatario4')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proceduras', function (Blueprint $table) {
            $table->dropColumn("firma5");
            $table->dropColumn("firmatario1");
            $table->dropColumn("firmatario2");
            $table->dropColumn("firmatario3");
            $table->dropColumn("firmatario4");
            $table->dropColumn("firmatario5");
        });
    }
};
