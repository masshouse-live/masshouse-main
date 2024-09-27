<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Convert string date_time to proper timestamp format
        DB::statement("UPDATE `events` SET `date_time` = STR_TO_DATE(`date_time`, '%Y-%m-%d %H:%i:%s')");

        // Change the column type from string to timestamp
        Schema::table('events', function (Blueprint $table) {
            $table->timestamp('date_time')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the column type back to string
        Schema::table('events', function (Blueprint $table) {
            $table->string('date_time')->change();
        });

        // Optionally, convert timestamp back to string format (if needed)
        DB::statement("UPDATE `events` SET `date_time` = DATE_FORMAT(`date_time`, '%Y-%m-%d %H:%i:%s')");
    }
};
