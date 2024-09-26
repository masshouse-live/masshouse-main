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
        // add new column to site settings (reservation_from and to)
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('reservation_from')->nullable();
            $table->string('reservation_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop new column from site settings
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('reservation_from');
            $table->dropColumn('reservation_to');
        });
    }
};
