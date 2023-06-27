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
        Schema::table('tb_checkin', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pendaftaran')->after('id');
            $table->foreign('id_pendaftaran')->references('id')->on('tb_pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_checkin', function (Blueprint $table) {
            $table->dropForeign(['id_pendaftaran']);
            $table->dropColumn('id_pendaftaran');
        });
    }
};
