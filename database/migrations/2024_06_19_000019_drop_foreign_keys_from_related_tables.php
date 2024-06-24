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
        // Schema::table('kapasitas_produksi', function (Blueprint $table) {
        //     $table->dropForeign(['id_kbli']);
        // });

        Schema::table('pelaku_usaha', function (Blueprint $table) {
            $table->dropForeign(['id_kbli']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('kapasitas_produksi', function (Blueprint $table) {
        //     $table->foreign('id_kbli')->references('id_kbli')->on('kbli')->onDelete('cascade');
        // });

        Schema::table('pelaku_usaha', function (Blueprint $table) {
            $table->foreign('id_kbli')->references('id_kbli')->on('kbli')->onDelete('cascade');
        });
    }
};
